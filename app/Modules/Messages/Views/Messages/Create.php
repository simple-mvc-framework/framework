<section class="content-header">
    <h1><?= __d('system', 'Send a Message'); ?></h1>
    <ol class="breadcrumb">
        <li><a href='<?= site_url('dashboard'); ?>'><i class="fa fa-dashboard"></i> <?= __d('system', 'Dashboard'); ?></a></li>
        <li><a href='<?= site_url('messages'); ?>'><?= __d('system', 'Messages'); ?></a></li>
        <li><?= __d('system', 'Send a Message'); ?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

<?= Session::getMessages(); ?>

<form class="form-horizontal" action="<?= site_url('messages'); ?>" method="POST" role="form">

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title"><?= __d('users', 'Send a new Message'); ?></h3>
    </div>
    <div class="box-body ">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="form-group <?= $errors->has('subject') ? 'has-error' : ''; ?>">
                <label class="col-sm-3 control-label" for="subject"><?= __d('system', 'Subject'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-9">
                    <input name="subject" id="subject" type="text" class="form-control" value="<?= Input::old('subject'); ?>" placeholder="<?= __d('system', 'Subject'); ?>">
                    <?php if ($errors->has('subject')) { ?>
                    <span class="help-block"><?= $errors->first('subject'); ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group <?= $errors->has('message') ? 'has-error' : ''; ?>">
                <label class="col-sm-3 control-label" for="message"><?= __d('system', 'Message'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-9">
                    <textarea id="message" name="message" class="form-control" style="resize: none;" placeholder="<?= __d('system', 'Message'); ?>" rows="5" ><?= Input::old('message'); ?></textarea>
                    <?php if ($errors->has('message')) { ?>
                    <span class="help-block"><?= $errors->first('message'); ?></span>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="user"><?= __d('system', 'Receiver'); ?> <font color='#CC0000'>*</font></label>
                <div class="col-sm-9">
                    <?php $opt_user = Input::old('user'); ?>
                    <select name="user" id="user" class="form-control select2">
                        <option value="" <?php if (empty($opt_user)) echo 'selected'; ?>>- <?= __d('system', 'Choose an User'); ?> -</option>
                        <?php foreach ($users as $user) { ?>
                        <option value="<?= $user->id ?>" <?php if ($opt_user == $user->id) echo 'selected'; ?>><?= $user->username; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <font color='#CC0000'>*</font><?= __d('system', 'Required field'); ?>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-success col-sm-2 pull-right"><i class='fa fa-send'></i> <?= __d('system', 'Send'); ?></button>
    </div>
</div>

<input type="hidden" name="_token" value="<?= csrf_token(); ?>">

</form>

<a class='btn btn-primary col-sm-2' href='<?= site_url('messages'); ?>'><?= __d('system', '<< Previous Page'); ?></a>

</section>
