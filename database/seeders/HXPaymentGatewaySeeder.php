<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HXPaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if HXPayment already exists
        $exists = DB::table('payment_methods')->where('tag', 'hxpayment')->exists();
        
        if (!$exists) {
            // Build insert data dynamically based on existing columns
            $insertData = [
                'name' => 'HXPayment',
                'tag' => 'hxpayment',
                'photo' => 'upload/payment/hxpayment_logo.png',
                'status' => 'inactive', // Set to inactive by default until configured
                'settings' => json_encode([
                    'api_url' => [
                        'title' => 'API URL',
                        'value' => 'https://hxpayment.net',
                        'type' => 'text',
                        'required' => true
                    ],
                    'merchantLogin' => [
                        'title' => 'Merchant Login',
                        'value' => '',
                        'type' => 'text',
                        'required' => true
                    ],
                    'merchant_key' => [
                        'title' => 'Merchant Secret Key',
                        'value' => '',
                        'type' => 'password',
                        'required' => true
                    ],
                    'customer_name' => [
                        'title' => 'Default Customer Name',
                        'value' => 'Customer',
                        'type' => 'text',
                        'required' => false
                    ],
                    'customer_email' => [
                        'title' => 'Default Customer Email',
                        'value' => 'customer@example.com',
                        'type' => 'email',
                        'required' => false
                    ],
                    'customer_phone' => [
                        'title' => 'Default Customer Phone',
                        'value' => '919999999999',
                        'type' => 'text',
                        'required' => false
                    ]
                ]),
                'created_at' => now(),
                'updated_at' => now()
            ];
            
            // Get existing columns
            $columns = DB::getSchemaBuilder()->getColumnListing('payment_methods');
            
            // Add optional columns if they exist
            if (in_array('minimum_recharge', $columns)) {
                $insertData['minimum_recharge'] = 100.00;
            }
            if (in_array('maximum_recharge', $columns)) {
                $insertData['maximum_recharge'] = 50000.00;
            }
            if (in_array('recharge_charge', $columns)) {
                $insertData['recharge_charge'] = 0.00;
            }
            if (in_array('minimum_withdraw', $columns)) {
                $insertData['minimum_withdraw'] = 150.00;
            }
            if (in_array('maximum_withdraw', $columns)) {
                $insertData['maximum_withdraw'] = 50000.00;
            }
            if (in_array('withdraw_charge', $columns)) {
                $insertData['withdraw_charge'] = 0.00;
            }
            
            DB::table('payment_methods')->insert($insertData);
            
            $this->command->info('✅ HXPayment gateway added successfully!');
        } else {
            $this->command->warn('⚠️  HXPayment gateway already exists.');
        }
    }
}
