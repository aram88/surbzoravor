<div class="divRed txtC Bmargin20">
    Հարց քահանային
</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'question-form',
	'enableAjaxValidation'=>false,
)); ?>


<div class=" txtJ" id="article">
<?php echo CHtml::image("images/main/harc.jpg",'',array("class "=>'pull-left Rmargin10'));?>
<p style="margin-top:0px;">Ճշմարտություն փնտրող միտքը շատ անգամներ կարող է հայտնվել բազում հարցերի առջև: Եվ այս դեպքում ամեն մի հարցի ճշմարիտ պատասխանը կարող է նոր ճանապարհ հարթել դեպի Ճշմարտությունը՝ դեպի Աստված. &laquo;Ե՛ս եմ ճանապարհը, ճշմարտությունը և կյանքը&raquo; (Հովհաննես 14:6):</p>

<p>Երբ մարդու սրտում թափանցում է Աստծո լույսը, և նա փորձում է իրապես ճանաչել իր Արարչին, ապա այդ ճանապարհին նրա սեղանի գիրքն է դառնում Սուրբ Գիրքը, կիրակին սրբացվում է Սբ. Պատարագի արարողության մասնակցությամբ, բարի գործերով, անհատական աղոթքին միանում է նաև ընդհանրական աղոթքը՝ ժամերգությունը, ամեն մի ուխտագնացություն դառնում է հավատքը նորոգելու հիանալի մի առիթ, աստվածային լույսի ներքո այլ են դառնում նաև մարդկային փոխհարաբերությունները: Եվ ամեն անգամ անքննելի Աստծո հետ հանդիպումը կարող է ի հայտ բերել բազում հարցեր:</p>

<p>Իսկ այս դեպքում կարևոր է այդ հարցերի պատասխանները ճիշտ աղբյուրից գտնել: Քանի որ պետք է զգուշանալ կամայական և քմահաճ մեկնություններից, որոնք դեպի հավիտենական կորուստ են առաջնորդում: Սբ. Պետրոս առաքյալն իր ընդհանրական երկրորդ նամակում Սբ. Պողոս առաքյալի նամակների և Սուրբ Գրքի հետ կապված գրում է. &laquo;Նա իր բոլոր նամակներում էլ խոսել էր այս բաների մասին: Այդ նամակներում կան մի շարք դժվարհասկանալի մասեր, որոնց իմաստը չարափոխում են տգետ և փոփոխամիտ մարդիկ: Նրանք չարափոխում են նաև մյուս Սուրբ Գրքերը՝ իրենց սեփական կորուստը պատրաստելով&raquo; (Բ Պետրոս 3:16):</p>

<p>Անչափ կարևորվում է, երբ Հայ Առաքելական Սուրբ եկեղեցու զավակը անտարբեր չէ և հետաքրքվում է, ուսումնասիրում թե՛ գրքերի գիրքը՝ Աստվածաշունչը, թե՛ մեր եկեղեցու դավանանքը, ծեսերն ու ավանդությունները:</p>

<p><span style="line-height:1.6em">Կայքի &laquo;Հարցեր քահանային&raquo; բաժինը նպատակ ունի հոգևորականի օգնությամբ առաջադրված հարցերի սպառիչ պատասխանները տալ՝ աղբյուր ունենալով Սբ. Գիրքը, եկեղեցու Սրբազան Ավանդությունը և եկեղեցու հայրերի աստվածաշնչային մեկնությունները:</span></p>

<p><span style="line-height:1.6em">&laquo;Հարցեր քահանային&raquo; բաժինը իր ենթաբաժիններով՝ ծիսական, աստվածաբանական խնդիրներ և հրեշտակներ, եկեղեցական իրողություններ, մեկնություն պահանջող աստվածաշնչային հարցեր, բարոյական առարկություններ անվանումներով, արդեն իսկ պատասխանել է մի շարք հարցերի կապված Աստծո բնության, Նրա անփոփոխ լինելու, Սբ. Երրորդության անձերից յուրաքանչյուրի, դժոխքի, մեղքի, անարդարությունների, նախախնամության և ճակատագրի, Սբ. Պատարագի, յոթ խորհուրդների, սրբերի, նրանց մասունքների և բարեխոսության, օրենքի, երդման, անեծքի, հայհոյանքի և այլնի վերաբերյալ:</span></p>

<p>Յուրաքանչյուր հարցի պատասխանը, հիմք ունենալով Սուրբ Գիրքը և մեր եկեղեցու հարուստ ժառանգությունը, հավատքի մեջ ամրապնդում և լուսավորում է մարդուն. &laquo;Քո խոսքը ճրագ է իմ ոտքերի համար և լուսավորում է իմ շավիղները&raquo; (Սաղմոս 118:105):</p>

<p>&nbsp;</p>

<p style="text-align: right;">Կարինե Սուգիկյան</p>
</div>
<p class="help-block"> <span class="required">*</span>-ով դաշտերը պարտադիր են</p>
<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>200)); ?>
    <?php echo $form->textFieldRow($model,'mail',array('class'=>'span5','maxlength'=>60)); ?>
	<?php echo $form->textAreaRow($model,'text',array('rows'=>6, 'cols'=>50, 'class'=>'span5')); ?>
	<?php echo $form->checkBoxRow($model,'publish'); ?>
<div class="clear-both"></div>
<div class="txtL">
  Խնդրում ենք հարցը գրել հայերեն տառերով։
 Ձեր նշած անունը, էլեկտրոնային հասցեն չեն հրապարակվի։
 </div>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
	        'htmlOptions'=>array('class'=>'btn-bg'),
			'label'=>'ՈՒղարկել հարցը',
		)); ?>
</div>
<?php $this->endWidget();?>
    <ul style="list-style:none;">
<?php foreach ($questions as $question):?>
    <li class=" click ">
       <img src='/images/main/logoMin.png'/>  <span class="red pointer  click " style="font-size:16px;position: relative; top:9px; left:8px;"> <?php echo $question->name;?></span>
         <?php if ($question->questions):?>
            <ul class="children hide" style="list-style:none;">
            <?php foreach ($question->questions as $que):?>
                   <li style="display:block; margin-bottom:25px; font-size:14px;"> <?php echo CHtml::link($que->text,'/question/'.$que->id);?> </li>
            <?php endforeach;?>
            </ul>
         <?php endif;?>
    </li>
<?php endforeach;?>
  </ul>
  
<script>
	jQuery(document).ready(function(){
		jQuery(".click").click(function(){
			jQuery(this).find(".children").toggle('slow');
			})
		})


jQuery('#article').readmore({
	  speed: 75,
	  maxHeight: 510,
	  overflow: 'hidden',
	  moreLink: '<a href="#">Կարդալ ավելին</a>',
	  lessLink: '<a href="#">Փակել</a>'
	});
</script>