<?php

namespace App\Jobs;

use App\Traits\LionsClub;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RegisterNewUserToBot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels,LionsClub;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        $this->sendPostRequest($this->data);
       
    }
}
