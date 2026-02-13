<?php 
    require_once 'config/function.php';
    if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM pte WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $all_pte = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PTE Mock Test Report</title>

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
                <h5 class="fw-bold">PTE REAL MOCK TEST SCORE REPORT</h5>
            </div>
            <div class="col-3">
                <div class="photo-box">
                    <img src="<?php echo 'uploads/category/'.$all_pte['image'] ?>">
                </div>
            </div>
        </div>

        <hr>

        <p><strong>Mode:</strong> PTE Academic - Real Mock Test</p>
        <p><strong>Test Date:</strong> <?php echo $all_pte['testdate'] ?> &nbsp;&nbsp;
            <strong>Report Date:</strong> <?php echo $all_pte['reportdate'] ?>
        </p>

        <div class="section-title">Candidate Details</div>
        <p>
            <strong>Name:</strong> <?php echo $all_pte['cname'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Candidate Number:</strong> <?php echo $all_pte['cnum'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Date of Birth:</strong> <?php echo $all_pte['dob'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Contact:</strong> <?php echo $all_pte['contact'] ?> 
        </p>

        <div class="section-title">Communicative Skills</div>
        <table class="table table-sm">
            <tr>
                <th>Skill</th>
                <th>Score (10-90)</th>
            </tr>
            <tr>
                <td>Listening</td>
                <td><?php echo $all_pte['listband'] ?></td>
            </tr>
            <tr>
                <td>Reading</td>
                <td><?php echo $all_pte['readband'] ?></td>
            </tr>
            <tr>
                <td>Writing</td>
                <td><?php echo $all_pte['writeband'] ?></td>
            </tr>
            <tr>
                <td>Speaking</td>
                <td><?php echo $all_pte['speakband'] ?></td>
            </tr>
        </table>

        <div class="section-title">Enabling Skills</div>
        <table class="table table-sm">
            <tr>
                <th>Skill</th>
                <th>Score (10-90)</th>
            </tr>
            <tr>
                <td>Grammar</td>
                <td><?php echo $all_pte['grammar'] ?></td>
            </tr>
            <tr>
                <td>Oral Fluency</td>
                <td><?php echo $all_pte['oralflu'] ?></td>
            </tr>
            <tr>
                <td>Pronunciation</td>
                <td><?php echo $all_pte['pro'] ?></td>
            </tr>
            <tr>
                <td>Vocabular</td>
                <td><?php echo $all_pte['vocabulary'] ?></td>
            </tr>
            <tr>
                <td>Spelling</td>
                <td><?php echo $all_pte['spelling'] ?></td>
            </tr>
            <tr>
                <td>Written Discourse</td>
                <td><?php echo $all_pte['writtendis'] ?></td>
            </tr>
        </table>

        <p><strong>Overall Band Score:</strong> <?php echo $all_pte['score'] ?></p>

        <div class="section-title">Result Status</div>
        <ul>
            <li><strong>Speaking Accuracy:</strong> <?php echo ucfirst($all_pte['speacc']) ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>Time Management:</strong> <?php echo ucfirst($all_pte['timemgmt']) ?> &nbsp;&nbsp;&nbsp;&nbsp; <strong>Microphone Usage:</strong> <?php echo $all_pte['microusa'] == 'needsimpro' ? 'Needs Improvement' : 'Good' ?></li>
        </ul>

        <div class="section-title">Examiner Comment: </div>
        <div style="height:20px;"></div>

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