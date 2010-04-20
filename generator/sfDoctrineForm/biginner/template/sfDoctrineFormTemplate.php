[?php

/**
 * <?php echo $this->table->getOption('name') ?> form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class <?php echo $this->table->getOption('name') ?>Form extends Base<?php echo $this->table->getOption('name') ?>Form
{
<?php if ($parent = $this->getParentModel()): ?>
  /**
   * @see <?php echo $parent ?>Form
   */
  public function configure()
  {
    parent::configure();
  }
<?php else: ?>
  public function configure()
  {
  }
<?php endif; ?>

  public function setup()
  {
    parent::setup();
    // ここにwidgetの処理を記述します
    
    // ここにvalidationの処理を記述します
    // $v =new sfValidatorCallback(array('callback' => array($this, 'checkUniqueEmail')));
    // $v->setMessage('invalid', '既に登録されているメールアドレスです。パスワードを忘れた場合はパスワードの再発行を行ってください');
  }
  // saveする前に処理をしたい場合
  public function updateObject($values=null)
  {
    $object = parent::updateObject($values);
    /*
     $object->setName("name: " . $object->getName());
    */
    return $object;
  }
  private function __samplecode()
  {
    
    // widgetの記述サンプル
    // http://symfony-jp.com/f/viewtopic.php?f=8&t=5&sid=0f84afcb9d94ba53468c6add2c4851e5
    //ドロップダウンリストここから
    $key = "sfWidgetFormChoice(dropDown)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('choices', array('なにも指定しないとドロップダウンに', 'なるよ', '！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //ドロップダウンリストここまで


    //リストボックスここから
    $key = "sfWidgetFormChoice(list)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleを', 'Trueにすると', 'リスト', 'に', 'なる！', '・・・', 'よ'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //リストボックスここまで


    //ラジオボタンここから
    $key = "sfWidgetFormChoice(radio)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('expandedを', 'Trueにすると', 'ラジオに', 'なる', 'よ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //ラジオボタンここまで


    //チェックボックスここから
    $key = "sfWidgetFormChoice(check)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleとexpandedを', 'True', 'にすると', 'チェックになるよ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //チェックボックスここまで


    //階層を持ったリストボックスここから
    $key = "sfWidgetFormChoice(kaisouList)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->setOption('choices', array(
      '一次階層'  => array('a' => '２次階層a', 'b' => '２次階層b', 'c' => '２次階層c'),
      'America' => array('d' => 'これは', 'e' => '正直', 'f' => '使いにくいかも'),
      'America2' => array('g' => 'USA'),
      'America3' => array('h' => 'USA', 'i' => 'Canada', 'j' => 'Brazil'),
      ));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //階層を持ったリストボックスここまで


    //階層を持ったラジオボタンここから
    $key = "sfWidgetFormChoice(kaisoulistRadio)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->setOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('renderer_options', array('template' => '<div style="background-color:#ff9933;"><strong>%group%</strong></div> %options%'));
    $this->widgetSchema   [$key]->addOption('choices', array(
      '一次階層A'  => array('a' => '２次階層a', 'b' => '２次階層b', 'c' => '２次階層c'),
      '一次階層B' => array('d' => 'こっちは', 'e' => '一見便利', 'f' => 'かも。デザイナさんは'),
      '一次階層C' => array('g' => 'li、ulでなんとか'),
      '一次階層D' => array('h' => 'してもらおう', 'i' => 'expandedを', 'j' => 'trueにしてあります。類別リストになるよ！'),
      ));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //階層を持ったラジオボタンここまで


    //階層を持ったチェックボックスここから
    $key = "sfWidgetFormChoice(kaisoulistCheack)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->setOption('multiple', true);
    $this->widgetSchema   [$key]->setOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('renderer_options', array('template' => '<div style="background-color:#009933;"><strong>%group%</strong></div> %options%'));
    $this->widgetSchema   [$key]->setOption('choices', array(
      '一次階層A' => array('a' => 'expandedとmultipleを', 'b' => 'trueにしてあります。類別チェックリストになるよ！'),
      ));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //階層を持ったチェックボックスここまで


    //年月日入力ここから
    $key = "sfWidgetFormDate";
    $this->widgetSchema   [$key] = new sfWidgetFormDate();
    $this->widgetSchema   [$key]->setOption('format', '%year%年%month%月%day%日');
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key]->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //年月日入力ここまで


    //年月日間隔入力ここから
    $key = "sfWidgetFormDateRange";
    $years = range(2007, 2012);
    $from_date = new sfWidgetFormDate();
    $from_date->setOption('format', '%year% 年 %month% 月%day%日');
    $from_date->setOption('years', array_combine($years, $years));
    $to_date = new sfWidgetFormDate();
    $to_date->setOption('format', '%year% 年 %month% 月%day%日');
    $to_date->setOption('years', array_combine($years, $years));
    $this->widgetSchema   [$key] = new sfWidgetFormDateRange(array('from_date'=>$from_date, 'to_date'=>$to_date, ));
    //   $this->widgetSchema   [$key]->addOption('from_date', new sfWidgetFormDate(array());
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key]->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //年月日間隔入力ここから


    //HTML入力ここから
    $key = "sfWidgetFormTextareaTinyMCE";
    $this->widgetSchema[$key] = new sfWidgetFormTextareaTinyMCE();
    $this->widgetSchema[$key]->setOption('width' , 550);
    $this->widgetSchema[$key]->setOption('height', 350);
    $this->widgetSchema[$key]->setOption('config', 'theme_advanced_disable: "anchor,image,cleanup,help"');
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key]->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //HTML入力ここまで


    //カレンダー入力ここから
    $key = "sfWidgetFormJQueryDate";
    $this->widgetSchema[$key] = new jpWidgetFormJQueryDate();
    $this->widgetSchema[$key]->setOption('culture', 'ja');
    $from_date = new sfWidgetFormDate();
    $from_date->setOption('format', '%year% 年 %month% 月%day%日');
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key]->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //カレンダー入力ここまで

    //バリデーションパターンここから
    $stringLengthValidator = array(
      'max_length' => 255,
      'min_length' => 8,
      'required'   => true,
      );
    $stringRegexValidator = array(
      'pattern'    => '/^[0-9a-zA-Z]*$/'
      );
    //バリデーションパターンここまで
    //チェックボックスここから
    $key = "1(check)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleとexpandedを', 'True', 'にすると', 'チェックになるよ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //チェックボックスここまで
    //チェックボックスここから
    $key = "2(check)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleとexpandedを', 'True', 'にすると', 'チェックになるよ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //チェックボックスここまで
    //チェックボックスここから
    $key = "3(check)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleとexpandedを', 'True', 'にすると', 'チェックになるよ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //チェックボックスここまで
    //チェックボックスここから
    $key = "4(check)";
    $this->widgetSchema   [$key] = new sfWidgetFormChoice(array('choices'=>array('key'=> 'value')));
    $this->widgetSchema   [$key]->addOption('multiple', true);
    $this->widgetSchema   [$key]->addOption('expanded', true);
    $this->widgetSchema   [$key]->setOption('choices', array('multipleとexpandedを', 'True', 'にすると', 'チェックになるよ！'));
    $this->validatorSchema[$key] = new sfValidatorString();
    $this->validatorSchema[$key] ->setOption('required', false);//入力必須ではない
    //   $this->validatorSchema[$key] ->setOption('required', true);//入力必須
    //   $this->validatorSchema[$key] ->setMessage('required', '入力必須です');
    //   $this->widgetSchema   [$key] ->setHidden(true);  // フォームをhiddenにする場合
    //チェックボックスここまで

    $this->widgetSchema->getFormFormatter()->setTranslationCatalogue('form');    
  }
}
