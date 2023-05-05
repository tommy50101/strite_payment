## Endpoint

[POST] http://host/api/payment/get_payment_url

Request body example (application/json):
```json
{
    "currency":"usd",
    "amount": 200,
    "price_id": "price_1Mzo4IBiXgImlwgFjHmE7TtJ",
    "quantity": 2
}
```

Response body example:
```json
{
    "status": 0,
    "data": {
        "url": "https://checkout.stripe.com/c/pay/cs_test_a1OMBLABie9QOQCnZDwDpbS1oD8tUgaHA8c5DjPpSFv9q9jt3X1pSFIPt4#fidkdWxOYHwnPyd1blpxYHZxWjA0SH9rNU9HbF1iTGhpcmJDd1Njf1BWS3RtYGprdVJsQkJWbzdnYnRfPWxodldoSG1IfE5RUTxDTUtsXFJAa0N3PWFvMXVGc0Azf09Xd200NXMwN2QxcGlRNTV0dH1XcVZKdCcpJ2N3amhWYHdzYHcnP3F3cGApJ2lkfGpwcVF8dWAnPyd2bGtiaWBabHFgaCcpJ2BrZGdpYFVpZGZgbWppYWB3dic%2FcXdwYHgl"
    }
}
```
