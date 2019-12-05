<?php

    include_once('layout/header.php');
    include_once('validator.php');

    $validator = new Validator();

    if($_POST) {
        $validator->SetForm($_POST);
        $validator->Validate();
    }

    $status_icon['success'] = '<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>';
    $status_icon['error'] = '<span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>';
    $status_icon[''] = '';
?>

<ol class="breadcrumb">
  <li><a href="https://sbsharma.com">Home</a></li>
  <li><a href="https://sbsharma.com/php">PHP</a></li>
  <li class="active">Filter var with php</li>
</ol>

    <div class="container">
        <div class="page-header">
            <h1>Filter variable with php</h1>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            
                <div class="panel panel-default theme-color mt-1">
                    <!-- Default panel contents -->
                    <div class="panel-heading theme-color text-center">
                        filter_var($variable, $filter_type, $options?)
                    </div>
                    <div class="panel-body">
                        <div class="alert alert-info alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Info!</strong> Sanitize string only remove html tags e.g. &ltp&gt example &lt/p&gt = example
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group has-<?= $validator->var['string']['status'] ?> has-feedback">
                                <label class="control-label" for="str_input">String</label>
                                <input <?= $validator->var['string']['focus'] ?> name="string" value="<?= $validator->var['string']['value'] ?>" type="text" class="form-control" id="str_input" placeholder="abcd">
                                <?= $status_icon[$validator->var['string']['status']] ?>
                            </div>
                            <div class="form-group has-<?= $validator->var['integer']['status'] ?> has-feedback">
                                <label class="control-label" for="int_input">Integer</label>
                                <input <?= $validator->var['integer']['focus'] ?> name="integer" value="<?= $validator->var['integer']['value'] ?>" type="text" class="form-control" id="int_input" placeholder="123456789">
                                <?= $status_icon[$validator->var['integer']['status']] ?>
                            </div>
                            <div class="form-group has-<?= $validator->var['email']['status'] ?> has-feedback">
                                <label class="control-label" for="email_input">Email address</label>
                                <input <?= $validator->var['email']['focus'] ?> name="email" value="<?= $validator->var['email']['value'] ?>" type="email" class="form-control" id="email_input" placeholder="example@xyz.com">
                                <?= $status_icon[$validator->var['email']['status']] ?>
                            </div>
                            <div class="form-group has-<?= $validator->var['url']['status'] ?> has-feedback">
                                <label class="control-label" for="url_input">URL</label>
                                <input <?= $validator->var['url']['focus'] ?> name="url" value="<?= $validator->var['url']['value'] ?>" type="text" class="form-control" id="url_input" placeholder="https://example.com">
                                <?= $status_icon[$validator->var['url']['status']] ?>
                            </div>
                            <div class="form-group has-<?= $validator->var['ip']['status'] ?> has-feedback">
                                <label class="control-label" for="ip_input">IP Address</label>
                                <input <?= $validator->var['ip']['focus'] ?> name="ip" value="<?= $validator->var['ip']['value'] ?>" type="text" class="form-control" id="ip_input" placeholder="127.0.0.1">
                                <?= $status_icon[$validator->var['ip']['status']] ?>
                            </div>

                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>
                    </div>
                    <div class="panel-footer theme-color text-center">Powered by <a class="link-color" href="https://sbsharma.com" target="_blank">www.sbsharma.com</a>
                    </div>
                </div>    
            </div>
        </div>
    </div>