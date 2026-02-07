-- ============================================
-- HXPayment Gateway Database Setup
-- ============================================
-- This file contains SQL commands to set up HXPayment gateway
-- Run these commands if the migration/seeder doesn't work

-- ============================================
-- STEP 1: Add columns if they don't exist
-- ============================================

-- Add 'tag' column (Skip if already exists)
ALTER TABLE `payment_methods` 
ADD COLUMN `tag` VARCHAR(50) NULL COMMENT 'Gateway identifier: watchpay, hxpayment, qepay, mapay, etc.' 
AFTER `name`;

-- Add 'settings' column (Skip if already exists)
ALTER TABLE `payment_methods` 
ADD COLUMN `settings` TEXT NULL COMMENT 'JSON configuration for gateway credentials and settings' 
AFTER `status`;

-- ============================================
-- STEP 2: Insert HXPayment Gateway Record
-- ============================================

INSERT INTO `payment_methods` (
    `name`,
    `tag`,
    `photo`,
    `minimum_recharge`,
    `maximum_recharge`,
    `recharge_charge`,
    `minimum_withdraw`,
    `maximum_withdraw`,
    `withdraw_charge`,
    `status`,
    `settings`,
    `created_at`,
    `updated_at`
) VALUES (
    'HXPayment',
    'hxpayment',
    'upload/payment/hxpayment_logo.png',
    100.00,
    50000.00,
    0.00,
    150.00,
    50000.00,
    0.00,
    'inactive',
    '{"api_url":{"title":"API URL","value":"https://hxpayment.net","type":"text","required":true},"merchantLogin":{"title":"Merchant Login","value":"","type":"text","required":true},"merchant_key":{"title":"Merchant Secret Key","value":"","type":"password","required":true},"customer_name":{"title":"Default Customer Name","value":"Customer","type":"text","required":false},"customer_email":{"title":"Default Customer Email","value":"customer@example.com","type":"email","required":false},"customer_phone":{"title":"Default Customer Phone","value":"919999999999","type":"text","required":false}}',
    NOW(),
    NOW()
);

-- ============================================
-- STEP 3: Update HXPayment credentials (Replace with your actual credentials)
-- ============================================

UPDATE `payment_methods` 
SET `settings` = JSON_SET(
    `settings`,
    '$.merchantLogin.value', 'YOUR_MERCHANT_LOGIN_HERE',
    '$.merchant_key.value', 'YOUR_SECRET_KEY_HERE'
),
`status` = 'active'
WHERE `tag` = 'hxpayment';

-- ============================================
-- VERIFICATION QUERIES
-- ============================================

-- Check if HXPayment is added
SELECT * FROM `payment_methods` WHERE `tag` = 'hxpayment';

-- View all payment methods
SELECT `id`, `name`, `tag`, `status` FROM `payment_methods`;

-- ============================================
-- OPTIONAL: Update callback URLs in settings table
-- ============================================

-- You may need to configure callback URLs in your settings
-- Example structure (adjust according to your settings table):
-- UPDATE `settings` 
-- SET `hxpayment_deposit_callback` = 'https://yourdomain.com/ipn/hxpayment/in',
--     `hxpayment_payout_callback` = 'https://yourdomain.com/ipn/hxpayment/out'
-- WHERE `id` = 1;

-- ============================================
-- NOTES
-- ============================================
-- 1. Replace 'YOUR_MERCHANT_LOGIN_HERE' with your actual HXPayment merchant login
-- 2. Replace 'YOUR_SECRET_KEY_HERE' with your actual HXPayment secret key
-- 3. Upload HXPayment logo to: public/upload/payment/hxpayment_logo.png
-- 4. Configure callback URLs in HXPayment merchant backend:
--    - Deposit: https://yourdomain.com/ipn/hxpayment/in
--    - Payout: https://yourdomain.com/ipn/hxpayment/out
-- 5. Set status to 'active' only after testing
