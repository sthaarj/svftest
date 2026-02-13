<?php 
    require_once 'config/function.php';
    if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM ielts WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $all_ielts = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>IELTS Mock Test Report</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        @page {
            size: A4;
            margin: 0;
        }

        html,
        body {
            width: 210mm;
            height: 297mm;
            margin: 0;
            font-size: 15px;
            position: relative;
        }
        body .img {
            width: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            z-index: -5;
            opacity: 0.1;
        }

        .report {
            height: 297mm;
            padding: 10mm;
        }
        .photo-box {
            width: 32mm;
            height: 40mm;
            border: 1px solid #000;
        }
        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .section-title {
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin-top: 15px;
        }
        table,
        th,
        td {
            border: 1px solid #000 !important;
            background: none !important;
        }
        .signature {
            margin-top: 40px;
            position: relative
        }
        .signature img {
            width: 100px;
            position: absolute;
            left: 43%;
            top: -40px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <img src="img/logo.png" alt="Logo" class="img">
    <div class="container-fluid report">

        <div class="row align-items-center">
            <div class="col-9 text-center">
                <h4 class="fw-bold">SKY VISION FOUNDATION</h4>
                <p class="mb-1">Gongabu Chowk, Kathmandu</p>
                <h5 class="fw-bold">IELTS REAL MOCK TEST SCORE REPORT</h5>
            </div>
            <div class="col-3">
                <div class="photo-box">
                    <img src="<?php echo 'uploads/category/'.$all_ielts['image'] ?>">
                </div>
            </div>
        </div>

        <hr>

        <p><strong>Mode:</strong> <?php echo $all_ielts['mode'] == 'paperbased' ? 'Paper- Based' :  'Computer-Based' ?></p>
        <p><strong>Test Date:</strong> <?php echo $all_ielts['testdate'] ?> &nbsp;&nbsp;
            <strong>Report Date:</strong> <?php echo $all_ielts['reportdate'] ?>
        </p>

        <div class="section-title">Candidate Details</div>
        <p>
            <strong>Name:</strong> <?php echo $all_ielts['cname'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Candidate Number:</strong> <?php echo $all_ielts['cnum'] ?> &nbsp;&nbsp;&nbsp; 
            <strong>Date of Birth:</strong> <?php echo $all_ielts['dob'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Contact:</strong> <?php echo $all_ielts['contact'] ?>
        </p>

        <div class="section-title">Section-wise Band Score</div>
        <table class="table table-sm">
            <tr>
                <th>Module</th>
                <th>Band Score</th>
                <th>Examinerr Remarks</th>
            </tr>
            <tr>
                <td>Listening</td>
                <td><?php echo $all_ielts['listband'] ?></td>
                <td><?php echo $all_ielts['listremarks'] ?></td>
            </tr>
            <tr>
                <td>Reading</td>
                <td><?php echo $all_ielts['readband'] ?></td>
                <td><?php echo $all_ielts['readremarks'] ?></td>
            </tr>
            <tr>
                <td>Writing</td>
                <td><?php echo $all_ielts['writeband'] ?></td>
                <td><?php echo $all_ielts['writeremarks'] ?></td>
            </tr>
            <tr>
                <td>Speaking</td>
                <td><?php echo $all_ielts['speakband'] ?></td>
                <td><?php echo $all_ielts['speakremarks'] ?></td>
            </tr>
        </table>

        <p><strong>Overall Band Score:</strong> <?php echo $all_ielts['score'] ?></p>

        <div class="section-title">Result Status</div>
        <ul>
            <li><strong>Task Achievement:</strong> <?php echo ucfirst($all_ielts['wasta']) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Coherence & Cohesion:</strong> <?php echo ucfirst($all_ielts['wascc']) ?></li>
            <li><strong>Lexical Resource:</strong> <?php echo ucfirst($all_ielts['waslr']) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Grammar Range & Accuracy:</strong> <?php echo ucfirst($all_ielts['wasgra']) ?></li>
        </ul>

        <div class="section-title">Examiner Comment</div>
        <div><?php echo $all_ielts['wascmt'] ?></div>

        <div class="section-title">Result Status</div>
        <ul>
            <li><strong>Fluency & Coherence:</strong> <?php echo ucfirst($all_ielts['sasfc']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Lexical Resource:</strong> <?php echo ucfirst($all_ielts['saslr']) ?></li>
            <li><strong>Grammar:</strong> <?php echo ucfirst($all_ielts['sasg']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Pronunciation:</strong> <?php echo ucfirst($all_ielts['sasp']) ?></li>
        </ul>

        <div class="section-title">Examiner Comment: </div>
        <div><?php echo $all_ielts['sascmt'] ?></div>
        <div class="section-title">Improvement Recommendation</div>
        <div><?php echo $all_ielts['impr'] ?></div>

        <div class="row signature text-center">
            <div class="col-4">__________________<br>Examiner</div>
            <div class="col-4">__________________<br>Stamp</div>
            <div class="col-4">__________________<br>Academic Head</div>
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="text-center mt-3"><em>This mock test score report designed to simulate the real IELTS exam evaluation.</em></div>
    </div>
    <div class="container-fluid no-print text-end p-2">
        <button class="btn btn-primary" onclick="window.print()">🖨 Print</button>
    </div>
</body>

</html>