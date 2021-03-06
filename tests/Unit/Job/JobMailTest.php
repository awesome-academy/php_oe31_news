<?php

namespace Tests\Unit\Job;

use Tests\TestCase;
use App\Models\User;
use App\Jobs\ProcessMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use App\Mail\CountPost;

class JobMailTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->make([
            'role_id' => 2,
        ]);
        $this->totalPendingPost = 2;
        $this->totalApprovedPost = 2;
        $this->job = new ProcessMail($this->user, $this->totalPendingPost, $this->totalApprovedPost);
    }

    public function tearDown(): void
    {
        unset($this->user);
        unset($this->totalPendingPost);
        unset($this->totalApprovedPost);
        unset($this->job);

        parent::tearDown();
    }

    public function test_job_handle_to_mail()
    {
        Mail::fake();
        $this->job->handle();
        Mail::assertSent(CountPost::class, 1);
    }
}
