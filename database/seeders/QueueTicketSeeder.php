<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QueueTicketSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('queue_tickets')->truncate();
        $queueIds = DB::table('queues')->pluck('id')->toArray();

        foreach ($queueIds as $queueId) {
            $oTotalTickets = rand(50, 200);

            $createdAt = now();
            $calledAt = now()->addMinutes(2);

            for($i = 0; $i < $oTotalTickets; $i++) {
                $status = '';
                $statusTmp = rand(1,4);

                if ($statusTmp == 1) {
                    $status = 'waiting';
                } else if ($statusTmp == 2) {
                    $status = 'called';
                } else if ($statusTmp = 3) {
                    $status = 'not_attended';
                } else if ($statusTmp = 4) {
                    $status = 'dimissed';
                }

                DB::table('queue_tickets')->insert([
                    'id_queue' => $queueId,
                    'queue_ticket_number' => $i + 1,
                    'queue_ticket_created_at' => $createdAt,
                    'queue_ticket_called_at' => $status === 'called' ? $calledAt : null,
                    'queue_ticket_called_by' => $status === 'called' ? 'user_'. rand(1, 10) : null, 
                    'queue_ticket_status' => $status,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $createdAt = $createdAt->addminutes(2);
                $calledAt = $createdAt->addminutes(2);
            }
        }
    }
}
