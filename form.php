<!DOCTYPE html>
<html>
<head>
    <title>Two-Step Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('https://www.ironberg.com.br/assets/images/ironberg-sp-12.jpeg');
            background-size: cover;
            background-position: center center;
        }

        /* Hide all steps initially */
        .step {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>

            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <!-- Step 1 -->
                                <form id="contactForm" class="mt-3" action="send_email.php" method="post" enctype="multipart/form-data">
                                    <div class="step" id="step1">
                                    <h3 class="display-4">Cadastro</h3>
                                        <div class="form-group">
                                                <label for="name">Nome Completo</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="surname">Peso/Altura</label>
                                                <input type="text" class="form-control" id="surname" name="surname" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="age">Idade</label>
                                                <input type="text" class="form-control" id="age" name="age" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="experience">Número de telefone (WhatsApp)</label>
                                                <input type="text" class="form-control" id="experience" name="experience" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="file">Foto</label>
                                                <input type="file" class="form-control-file" id="file" name="file" accept="image/*" required>
                                        </div>
                                        
                                        <button type="button" class="btn btn-primary" id="nextButton1">Next</button>
                                    </div>

                                    <!-- Step 2 -->

                                    <div class="step" id="step2">
                                        <h3 class="display-4"> QR Code</h3>
                                        <p class="text-muted mb-4">Escaneie o QR code do código PIX para proceder.</p>
                                        <img class="mb-3" src="https://randomqr.com/assets/images/randomqr-256.png" alt="QR Code" id="qrCode">
                                        <button type="button" class="btn btn-primary" id="nextButton2">Next</button>
                                    </div>
                                    <!-- Step 3 -->
                                    <div class="step" id="step3">
                                        <h3 class="display-4">Comprovante</h3>
                                        <p class="text-muted mb-4">Confirmation message goes here.</p>
                                        <div class="form-group">
                                            <label for="recibo">Print do comprovante</label>
                                            <input type="file" class="form-control-file" id="recibo" name="recibo" accept="image/*" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="submitButton">Finalizar a Assinatura</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Show the first step initially
        document.getElementById("step1").style.display = "block";

        // Step 1: Hide step 1 and show step 2 when "Next" button 1 is clicked
        document.getElementById("nextButton1").addEventListener("click", function() {
            document.getElementById("step1").style.display = "none";
            document.getElementById("step2").style.display = "block";
        });

        // Step 2: Hide step 2 and show step 3 when "Next" button 2 is clicked
        document.getElementById("nextButton2").addEventListener("click", function() {
            document.getElementById("step2").style.display = "none";
            document.getElementById("step3").style.display = "block";
        });
    </script>
    <script>
    // Show the first step initially
    document.getElementById("step1").style.display = "block";

    // Step 1: Hide step 1 and show step 2 when "Next" button 1 is clicked
    document.getElementById("nextButton1").addEventListener("click", function() {
        if (validateStep1()) {
            document.getElementById("step1").style.display = "none";
            document.getElementById("step2").style display = "block";
        }
    });

    function validateStep1() {
        var name = document.getElementById("name").value;
        var surname = document.getElementById("surname").value;
        var age = document.getElementById("age").value;
        var experience = document.getElementById("experience").value;
        var file = document.getElementById("file").value;

        if (name === "") {
            alert("Nome Completo é obrigatório.");
            return false;
        }

        if (surname === "") {
            alert("Peso/Altura é obrigatório.");
            return false;
        }

        if (age === "") {
            alert("Idade é obrigatório.");
            return false;
        }

        if (experience === "") {
            alert("Número de telefone (WhatsApp) é obrigatório.");
            return false;
        }

        if (file === "") {
            alert("Você deve fazer o upload de uma foto 3x4.");
            return false;
        }

        return true;
    }
</script>

<script>
    // Show the first step initially
    document.getElementById("step1").style.display = "block";

    // Step 1: Hide step 1 and show step 2 when "Next" button 1 is clicked
    document.getElementById("nextButton1").addEventListener("click", function() {
        if (validateStep1()) {
            document.getElementById("step1").style.display = "none";
            document.getElementById("step2").style.display = "block";
        }
    });

    // Step 2: Hide step 2 and show step 3 when "Next" button 2 is clicked
    document.getElementById("nextButton2").addEventListener("click", function() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step3").style.display = "block";
    });

    // Final step: Notify the user and submit the form
    document.getElementById("submitButton").addEventListener("click", function() {
        // Notify the user
        alert("Você agora faz parte do nosso time! Entraremos em contato em breve.");

        // You can also submit the form if needed
        // document.getElementById("contactForm").submit();
    });

    function validateStep1() {
        // Add your validation code for Step 1 fields here

        // Return true if validation passes, false if there are errors
    }
</script>

</body>
</html>
