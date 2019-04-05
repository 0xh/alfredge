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
    protected $sendSupportEmailsTo = 'gio@webstarts.com';

    /**
     * All of the application developer e-mail addresses.
     *
     * @var array
     */
    protected $developers = [
        'admin@mentalstack.com',
        'gio@webstarts.com'
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
        Spark::useStripe()->teamTrialDays(10);

        Spark::teamPlan('Basic', 'prod_EpYjWMzEGDvbOL')
            ->price(49.99)
            ->features([
                'Team Members $14.99/Member', 'Property Add-On $19.99/Property', 'Check-in Reports $9.99/Report','Guest Invites 10 Invites/Month','Questionnaire Limitations','No Alfredge Support','No Access to House Rules','No Access to House Manual'
            ]);

        Spark::teamPlan('Standard', 'prod_EpYm2YLoIjab5P')
            ->price(99.99)
            ->features([
                'Team Members $9.99/Member', 'Property Add-On $19.99/Property', 'Check-in Reports $2.99/Report','Guest Invites Unlimited','Questionnaire Unlimited','No Alfredge Support','Access to House Rules','Access to House Manual'
            ]);
        
        Spark::teamPlan('Business', 'prod_EpYno1FcD1e5Qz')
            ->price(199.99)
            ->features([
                'Team Members Unlimited', 'Property Add-On Unlimited', 'Check-in Reports Unlimited','Guest Invites Unlimited','Questionnaire Unlimited','Alfredge Support','Access to House Rules','Access to House Manual'
            ]);
    }
}
