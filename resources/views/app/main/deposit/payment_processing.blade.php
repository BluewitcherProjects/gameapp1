<x-app-layout>
    <style>
        .processing-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 20px;
        }

        .processing-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .spinner {
            width: 80px;
            height: 80px;
            border: 8px solid #f3f3f3;
            border-top: 8px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 30px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .processing-title {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 15px;
        }

        .processing-text {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .order-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
        }

        .order-row:last-child {
            border-bottom: none;
        }

        .order-label {
            color: #888;
            font-size: 14px;
        }

        .order-value {
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        .btn-return {
            background: #667eea;
            color: white;
            border: none;
            padding: 15px 40px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-return:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .status-checking {
            color: #667eea;
            font-size: 14px;
            margin-top: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            animation: scaleIn 0.5s ease-out;
        }

        @keyframes scaleIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .checkmark {
            color: white;
            font-size: 40px;
        }
    </style>

    <div class="processing-container">
        <div class="processing-card">
            <div id="loadingState">
                <div class="spinner"></div>
                <h2 class="processing-title">Processing Payment</h2>
                <p class="processing-text">
                    Please wait while we confirm your payment.<br>
                    Do not close this window or press the back button.
                </p>
            </div>

            <div id="successState" style="display: none;">
                <div class="success-icon">
                    <span class="checkmark">✓</span>
                </div>
                <h2 class="processing-title">Payment Successful!</h2>
                <p class="processing-text">
                    Your payment has been confirmed.<br>
                    Redirecting to your account...
                </p>
            </div>

            <div class="order-info">
                <div class="order-row">
                    <span class="order-label">Order ID:</span>
                    <span class="order-value">{{ $order_id }}</span>
                </div>
                <div class="order-row">
                    <span class="order-label">Amount:</span>
                    <span class="order-value">{{ currency() }}{{ number_format($amount, 2) }}</span>
                </div>
                <div class="order-row">
                    <span class="order-label">Gateway:</span>
                    <span class="order-value">{{ $gateway }}</span>
                </div>
                <div class="order-row">
                    <span class="order-label">Status:</span>
                    <span class="order-value" id="payment-status">Checking...</span>
                </div>
            </div>

            <div class="status-checking" id="statusMessage">
                🔄 Checking payment status...
            </div>

            <div style="margin-top: 30px;">
                <a href="{{ route('recharge.history') }}" class="btn-return">
                    View Transaction History
                </a>
            </div>

            <p style="margin-top: 20px; font-size: 12px; color: #999;">
                If payment is taking too long, please check your transaction history
            </p>
        </div>
    </div>

    <script>
        let checkCount = 0;
        const maxChecks = 60; // Check for 5 minutes (60 * 5 seconds)
        const orderId = "{{ $order_id }}";

        function checkPaymentStatus() {
            if (checkCount >= maxChecks) {
                document.getElementById('statusMessage').innerHTML = '⏱️ Payment verification timed out. Please check your transaction history.';
                return;
            }

            fetch('/api/check-payment-status/' + orderId)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Payment confirmed
                        document.getElementById('loadingState').style.display = 'none';
                        document.getElementById('successState').style.display = 'block';
                        document.getElementById('payment-status').textContent = 'Confirmed';
                        document.getElementById('payment-status').style.color = '#4CAF50';
                        document.getElementById('statusMessage').innerHTML = '✓ Payment confirmed successfully!';
                        
                        // Redirect after 2 seconds
                        setTimeout(() => {
                            window.location.href = '{{ route("recharge.history") }}';
                        }, 2000);
                    } else if (data.status === 'pending') {
                        // Still pending, check again
                        checkCount++;
                        document.getElementById('statusMessage').innerHTML = `🔄 Checking payment status... (${checkCount}/${maxChecks})`;
                        setTimeout(checkPaymentStatus, 5000); // Check every 5 seconds
                    } else {
                        // Failed or unknown status
                        document.getElementById('payment-status').textContent = 'Failed';
                        document.getElementById('payment-status').style.color = '#f44336';
                        document.getElementById('statusMessage').innerHTML = '❌ Payment verification failed. Please contact support.';
                    }
                })
                .catch(error => {
                    console.error('Error checking payment status:', error);
                    checkCount++;
                    if (checkCount < maxChecks) {
                        setTimeout(checkPaymentStatus, 5000);
                    }
                });
        }

        // Start checking after 3 seconds
        setTimeout(checkPaymentStatus, 3000);
    </script>
</x-app-layout>
