<?php 
    require_once 'config/function.php';
    if(isset($_GET,$_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM japanese WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $all_japanese = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Japanese Mock Test Report</title>

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
            margin-top: 10px;
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
                <h5 class="fw-bold">JAPANESE LANGUAGE MOCK TEST SCORE REPORT</h5>
            </div>
            <div class="col-3">
                <div class="photo-box">
                    <img src="img/image.jpg">
                </div>
            </div>
        </div>

        <hr>

        <p><strong>Level:</strong> <?php echo ucfirst($all_japanese['level']) ?></p>
        <p><strong>Test Date:</strong> <?php echo $all_japanese['testdate'] ?> &nbsp;&nbsp;
            <strong>Report Date:</strong> <?php echo $all_japanese['reportdate'] ?>
        </p>

        <div class="section-title">Candidate Details</div>
        <p>
            <strong>Name:</strong> <?php echo $all_japanese['cname'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Candidate Number:</strong> <?php echo $all_japanese['cnum'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Date of Birth:</strong> <?php echo $all_japanese['dob'] ?> &nbsp;&nbsp;&nbsp;&nbsp;
            <strong>Contact:</strong> <?php echo $all_japanese['contact'] ?> &nbsp;&nbsp;&nbsp;
        </p>

        <div class="section-title">Section-wise Score</div>
        <table class="table table-sm">
            <tr>
                <th>Section</th>
                <th>Marks Obtained</th>
                <th>Full Marks</th>
            </tr>
            <tr>
                <td>Vocabulary & Kanji</td>
                <td><?php echo $all_japanese['vocabulary'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Grammar</td>
                <td><?php echo $all_japanese['grammar'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Reading</td>
                <td><?php echo $all_japanese['reading'] ?></td>
                <td></td>
            </tr>
            <tr>
                <td>Listening</td>
                <td><?php echo $all_japanese['listening'] ?></td>
                <td></td>
            </tr>
        </table>

        <p><strong>Total Marks:</strong> <?php echo $all_japanese['score'] ?> / ______</p>

        <div class="section-title">Result Status</div>
        <p><?php echo ucfirst($all_japanese['resultstatus']) ?></p>

        <div class="section-title">Examiner Remarks</div>
        <div><?php echo $all_japanese['examremarks'] ?></div>

        <div class="section-title">Study Recommendation</div>
        <div class="mb-5"><?php echo $all_japanese['studyrecom'] ?></div>

        <div class="row signature text-center">
            <div class="col-4">__________________<br>Examiner</div>
            <div class="col-4">__________________<br>Stamp</div>
            <div class="col-4">__________________<br>Academic Head</div>
            <img src="img/logo.png" alt="Logo">
        </div>
        <div class="text-center mt-3"><em>This mock test is conducted strictly following Japanese Language proficiency exam standards.</em></div>
    </div>
    <div class="container-fluid no-print text-end p-2">
        <button class="btn btn-primary" onclick="window.print()">🖨 Print</button>
    </div>
</body>

</html>