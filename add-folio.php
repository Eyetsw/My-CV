<!DOCTYPE html>
<html lang="th">

<head>
    <title>addfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/b827d8c466.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <?php include_once 'dbconfig.php';?>

    <?php include 'navbar.php' ?>

    <script src="https://cdn.tiny.cloud/1/u2xjfj3dqn6vs0szmmq2w7ogcg7xi7x4pt7w400pgaz7zz97/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

</head>

<body>

    <div style="background-color:#eceff1;  height: 150px; ">
        <h2 class="text-center" style=" padding: 50px;"><b>เพิ่มผลงาน</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="POST" action="db-folio.php" enctype="multipart/form-data">
                    <div>
                        <label for="portfolio_name" style="margin-top: 20px;">ชื่อผลงาน</label>
                        <input type="text" class="form-control" style="margin-top: 15px;" id="portfolio_name" name="portfolio_name" required="">
                    </div>
                    <div>
                        <label for="portfolio_image" style="margin-top: 20px;">อัปโหลดรูปภาพ</label>
                        <input type="file" class="form-control" style="margin-top: 15px;" id="portfolio_image" name="portfolio_image" required="">
                    </div>
                    <div>
                        <label for="portfolio_detils" style="margin-top: 20px;">รายละเอียดผลงาน</label>
                        <div style="margin-top: 15px;">
                            <script>
                                tinymce.init({
                                    selector: 'textarea',
                                    plugins: [
                                        'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
                                        'checklist', 'mediaembed', 'casechange', 'export', 'formatpainter', 'pageembed', 'a11ychecker', 'tinymcespellchecker', 'permanentpen', 'powerpaste', 'advtable', 'advcode', 'editimage', 'advtemplate', 'ai', 'mentions', 'tinycomments', 'tableofcontents', 'footnotes', 'mergetags', 'autocorrect', 'typography', 'inlinecss', 'markdown',
                                        'importword', 'exportword', 'exportpdf'
                                    ],
                                    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                                    tinycomments_mode: 'embedded',
                                    tinycomments_author: 'Author name',
                                    mergetags_list: [{
                                            value: 'First.Name',
                                            title: 'First Name'
                                        },
                                        {
                                            value: 'Email',
                                            title: 'Email'
                                        },
                                    ],
                                    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject('See docs to implement AI Assistant')),
                                });
                            </script>
                            <textarea> Write a description here...</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 20px; margin-bottom: 40px;">บันทึกผลงาน</button>
                </form>
            </div>
        </div>
    </div>


</body>