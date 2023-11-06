<!DOCTYPE html>
<html>
<head>
    <title>Get Ledger Name</title>
    
</head>
<body>
    <h1>Lookup Ledger Name</h1>
    <input type="text" id="contact_number" placeholder="Enter Contact Number">
    <button id="lookup_btn">Lookup</button>
    <div id="result"></div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#lookup_btn').click(function(){
                var contactNumber = $('#contact_number').val();

                $.ajax({
                    url: '<?= base_url('master/getLedgerName') ?>',
                    method: 'post',
                    data: { contact: contactNumber },
                    dataType: 'json',
                    success: function(response) {
                        if (response.ledgerName) {
                            $('#result').text('Ledger Name: ' + response.ledgerName);
                        } else {
                            $('#result').text('Ledger not found.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
