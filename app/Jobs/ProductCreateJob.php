<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Product;
use App\Mail\ProductCreate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCreateJob implements ShouldQueue
{
    use Queueable;
    //public User $user;
    /**
     * Create a new job instance.
     */
    public function __construct(public User $user , public Product $product)
    {
        //$this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        logger('Product Created');

        Mail::to($this->user->email)->send(new ProductCreate($this->product));
    }
}
