<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Test Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<button id="payBtn">Pay ₹500</button>

<script>
document.getElementById('payBtn').onclick = function () {

    fetch('/create-order', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            amount: 500
        })
    })
    .then(res => res.json())
    .then(data => {

        var options = {
            "key": data.key,
            "amount": data.amount * 100,
            "currency": "INR",
            "name": "Test Company",
            "description": "Test Payment",
            "order_id": data.order_id,
            "handler": function (response){
                fetch('/payment-success', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(response)
                })
                .then(res => res.json())
                .then(data => alert(data.status));
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    });
};
</script>

</body>
</html>
