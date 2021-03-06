<?php

namespace App\Providers;

use Laravel\Spark\Spark;
use Laravel\Spark\Providers\AppServiceProvider as ServiceProvider;

class SparkServiceProvider extends ServiceProvider
{
    /**
     * Your application and company details.
     *
     * @var array
     */
    protected $details = [
        'vendor' => 'Your Company',
        'product' => 'Your Product',
        'street' => 'PO Box 111',
        'location' => 'Your Town, NY 12345',
        'phone' => '555-555-5555',
    ];

    /**
     * The address where customer support e-mails should be sent.
     *
     * @var string
     */
    protected $sendSupportEmailsTo = null;

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'jmob1986@gmail.com'
    ];

    /**
     * Indicates if the application will expose an API.
     *
     * @var bool
     */
    protected $usesApi = true;

    /**
     * Finish configuring Spark for the application.
     *
     * @return void
     */
    public function booted()
    {

        Spark::useStripe()->noCardUpFront();

        Spark::freeTeamPlan('Free')
            ->attributes([
                'max_projects' => 1
            ])
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::TeamPlan('Tiny', 'provider-id-1')
            ->price(5)
            ->attributes([
                'max_projects' => 3
            ])
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::TeamPlan('Small', 'provider-id-1')
            ->price(10)
            ->attributes([
                'max_projects' => 10
            ])
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::TeamPlan('Medium', 'provider-id-1')
            ->price(10)
            ->attributes([
                'max_projects' => 25
            ])
            ->features([
                'First', 'Second', 'Third'
            ]);

        Spark::TeamPlan('Large', 'provider-id-1')
            ->price(10)
            ->attributes([
                'max_projects' => 50
            ])
            ->features([
                'First', 'Second', 'Third'
            ]);
        
    }
}
