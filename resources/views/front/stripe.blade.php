<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment Page - HackTheStuff</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style type="text/css">
        .hide {
            display: none;
        }

        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>
</head>
<title>Payment Page</title>
<body>
<div class="container">
    <div class="container">
        <div class="py-5 text-center">
            <img
                class="mb-4 d-block mx-auto"
                src="https://v5.getbootstrap.com/docs/5.0/assets/brand/bootstrap-solid.svg"
                alt="Bootstrap Logo"
                width="72"
                height="72"
            />
            <h2>Checkout form</h2>
        </div>
    </div>
    <h1>Card Information</h1>
    <div class="container">
        <div class="col-md-12 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <form
                        role="form"
                        action="{{ route('stripe.post') }}"
                        method="post"
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class="row my-3 gy-3">
                            <div class='col-md-6 mb-4 form-group required'>
                                <label class='control-label form-label'>Name on Card</label>
                                <input
                                    class='form-control' size='4' type='text'>
                                <small class="text-muted">
                                    Full name as displayed on the card.
                                </small>
                            </div>


                            <div class='col-md-6 mb-4 form-group  required'>
                                <label class='control-label'>Card Number</label>
                                <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>

                            <div class='col-md-6 mb-4 form-group cvc required'>
                                <label class='control-label form-label'>CVV/CVC</label>
                                <input autocomplete='off'
                                       class='form-control card-cvc'
                                       placeholder='ex. 311' size='4'
                                       type='text'>
                            </div>
                            <div class='col-md-6 mb-4 form-group expiration required'>
                                <label class='control-label form-label'>Expiration Month</label>
                                <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-md-6 mb-4 form-group expiration required'>
                                <label class='control-label form-label'>Expiration Year</label>
                                <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>


                            <div class='col-md-6 mb-4 error form-group hide'>
                                <div class='alert-danger alert '>Please correct the errors and try
                                    again.
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Proceed to Checkout</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function () {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function (e) {
            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('hide');
            $('.has-error').removeClass('has-error');
            $inputs.each(function (i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
</html>
