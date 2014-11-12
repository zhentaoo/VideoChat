<style>
    .s_block {
        width: 160px;
        /*height: 240px;*/
        /*border: 1px solid wheat;*/
        border-radius: 15px;
        float: left;
        margin: 15px;
        margin-bottom: 30px;
        padding: 10px;
        /*background-color: blue;*/
    }
</style>
<script>
    $(function () {
        $(".s_block").mouseenter(function () {
//            alert("sdf");
            $(this).css("background-color",
                "#DFE3FE");
        });
        $(".s_block").mouseleave(function () {
            $(this).css("background-color",
                "white");
        });
    })
</script>

<div class="col-lg-9 col-lg-offset-1 col-xs-9 col-xs-offset-1 "
     style="min-height: 550px;border: 1px solid #d3d3d3;border-radius: 8px;margin-top:60px;margin-bottom: 10px;">
    <!--    <h2>房间列表  点击头像与房主聊天</h2>-->
    <?php
    foreach ($videoList as $_v) {
        ?>
        <div class="s_block">
            <a target="_blank" href="/yii-test/index.php/user/videoRoom?id=<?php echo $_v->id; ?>"> <img width="100%"
                                                                                                         height="160px"
                                                                                                         style="border: 1px solid #ffffff;border-radius: 25px;"
                                                                                                         src="/yii-test/<?php $name = $_v->creator;
                                                                                                         $img = new Img();
                                                                                                         $var = $img->find('name=:name', array(':name' => $name));
                                                                                                         if ($var == null)
                                                                                                             echo 'images/nopic.jpg';
                                                                                                         else
                                                                                                             echo $var->url;
                                                                                                         ?>
                "></a>
            <?php echo $_v->creator; ?>
            <?php echo $_v->name; ?>
            <?php echo $_v->password; ?>
            <?php echo $_v->id; ?>
            <a target="_blank" href="/yii-test/index.php/user/videoRoom?id=<?php echo $_v->id; ?>">进入</a>
        </div>
    <?php } ?>

    <h5>
        <div style="width: 100%;float: left">
            <ul class="pagination "><?php echo $page_list; ?></ul>
        </div>
    </h5>
</div>

<!--侧边导航栏-->
<div class="col-lg-2 col-xs-2" style="margin-top: 60px;">
    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal2">
        创建房间
    </button>
    <div>房间列表 点击头像与房主聊天</div>
</div>
<!--侧边导航栏结束-->

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">创建房间</h4>
            </div>
            <div class="modal-body">

                <?php $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                )); ?>

                <div class="form-group">
                    <label>房间名</label>
                    <?php echo $form->textField($model, 'name', array('class' => 'form-control', 'placeholder' => '房间名',
                        'required' => 'required')) ?>
                    <?php echo $form->error($model, 'name', array('class' => 'error_style')); ?>
                </div>
                <div class="form-group">
                    <label>密码</label>
                    <?php echo $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => '密码可以不填')) ?>
                    <?php echo $form->error($model, 'password', array('class' => 'error_style')); ?>
                </div>
                <div style="display: none">
                    <label>创建者</label>
                    <?php echo $form->textField($model, 'creator', array('value' => Yii::app()->user->name)) ?>
                    <?php echo $form->error($model, 'creator'); ?>
                </div>

                <div style="padding-bottom: 10px;padding-top: 15px">
                    <button type="submit" class="btn btn-success">创建</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
                </div>
                <?php $this->endWidget(); ?>

            </div>

        </div>
    </div>
</div>


