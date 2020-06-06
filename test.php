<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $language; ?>" xml:lang="<?php echo $language; ?>">
<head>
<title><?php echo $title; ?></title>
<base href="<?php echo $base; ?>" />
<link rel="stylesheet" type="text/css" href="view/stylesheet/invoice.css" />
</head>
<body>
<?php foreach ($orders as $k=>$order) { ?>
<div class="invice-cont" style="page-break-after: always;" id="contentss<?php echo $k+1; ?>">
  <h1><?php echo $text_invoice; ?></h1>
  <table class="store">
    <tbody><tr>
      <td><img src="/buildimat/image/data/buildimat/logo/invlogo-01.jpg" alt=""></td>
      <td align="right" valign="top"><table>
          <tbody>
          <?php if ($order['invoice_no']) { ?>
          <tr>
            <td><b><?php echo $text_invoice_no; ?></b></td>
            <td><?php echo $order['invoice_no']; ?></td>
          </tr>
          <?php } ?>
          <tr>
            <td><b><?php echo $text_order_id; ?></b></td>
            <td><?php echo $order['order_id']; ?></td>
          </tr>
          <tr>
            <td><b><?php echo $text_date_added; ?></b></td>
            <td><?php echo $order['date_added']; ?></td>
          </tr>
          <!-- <tr>
            <td><b><?php echo $text_shipping_added; ?></b></td>
            <td></td>
          </tr> -->
          </tbody></table></td>
    </tr>
  </tbody></table>
  <table class="address">
    <tbody><tr class="heading">
      <td colspan="2"><b><?php echo $text_pay_info; ?></b></td>
      <td width="10%">&nbsp;</td>
      <td width="43%"><b><?php echo $text_shipping_info; ?></b></td>
    </tr>
      <tr>
        <td width="9%" class="address-text-lt"><?php echo $text_customer_name; ?></td>
        <td width="38%" class="address-text-rt">
          <?php echo $order['new_pay_info']['company']; ?>
        </td>
        <td class="address-text-lt"><?php echo $text_shipping_name; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_shipping_info']['company']; ?>
        </td>
      </tr>
      <tr>
        <td class="address-text-lt"><?php echo $text_name; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_pay_info']['firstname'].$order['new_pay_info']['lastname']; ?>
        </td>
        <td class="address-text-lt"><?php echo $text_name; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_shipping_info']['firstname'].$order['new_shipping_info']['lastname']; ?>
        </td>
      </tr>
      <tr>
        <td class="address-text-lt"><?php echo $text_telephone1; ?></td>
        <td class="address-text-rt">
           <?php echo $order['new_pay_info']['telephone']; ?>
        </td>
        <td class="address-text-lt"><?php echo $text_telephone1; ?></td>
        <td class="address-text-rt">&nbsp;</td>
      </tr>
      <!-- <tr>
        <td class="address-text-lt">聯絡電話2. :</td>
        <td class="address-text-rt">91234567</td>
        <td class="address-text-lt">聯絡電話2. :</td>
        <td class="address-text-rt">91234567</td>
      </tr> -->
      <tr>
        <td class="address-text-lt"><?php echo $text_email_address; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_pay_info']['email']; ?>
        </td>
        <td class="address-text-lt"></td>
        <td class="address-text-rt">&nbsp;</td>
      </tr>
      <tr>
        <td class="address-text-lt"><?php echo $text_shipping_address; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_pay_info']['city'].$order['new_pay_info']['address_1']; ?>
        </td>
        <td class="address-text-lt"><?php echo $text_shipping_address; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_shipping_info']['city'].$order['new_shipping_info']['address_1']; ?>
        </td>
      </tr>
      <tr>
        <td class="address-text-lt"><?php echo $text_area; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_pay_info']['city'] ?>
        </td>
        <td class="address-text-lt"><?php echo $text_area; ?></td>
        <td class="address-text-rt">
          <?php echo $order['new_shipping_info']['city']; ?>
        </td>
      </tr>
      <tr>
        <td class="address-text-lt"><?php echo $text_order_comment; ?></td>
        <td class="address-text-rt"><?php echo $order['comment']; ?></td>
        
        <td class="address-text-lt"><?php echo $text_shipping_comment; ?></td>
        <td class="address-text-rt">&nbsp;</td>
      </tr>
  </tbody></table>
  <table class="product">
    <tbody><tr class="heading">
      <td width="15%"><b><?php echo $column_model; ?></b></td>
      <td width="45%"><b><?php echo $column_product; ?></b></td>
      <td width="12%"><b><?php echo $column_quantity; ?></b></td>
      <td width="14%" align="center"><b><?php echo $column_price; ?></b></td>
      <td width="14%" align="center"><b><?php echo $column_total; ?></b></td>
    </tr>
    <?php foreach ($order['product'] as $product) { ?>
    <tr>
      <td><?php echo $product['model']; ?></td>
      <td><?php echo $product['name']; ?></td>
      <td align="center"><?php echo $product['quantity']; ?></td>
      <td align="right"><?php echo $product['price']; ?></td>
      <td align="right"><?php echo $product['total']; ?></td>
    </tr>
    <?php } ?>
    <tr>
      <td align="right" colspan="4">&nbsp;</td>
      <td align="right">&nbsp;</td>
    </tr>
    
    <?php foreach ($order['total'] as $total_key=>$total) { ?>
    <tr>
      <?php if($total_key==0){?>
      <td align="right" colspan="2"><?php echo $text_sum; ?></td>
      <td align="center"><?php echo $order['all_quantity'] ?></td>
      <td align="right"><?php echo $total['title']; ?>:</td>
      <td align="right"><?php echo $total['text']; ?></td>
      <?php }else{ ?>
      <td align="right" colspan="4"><?php echo $total['title']; ?>:</td>
      <td align="right"><?php echo $total['text']; ?></td>
      <?php }?>
    </tr>
    <?php } ?>
  </tbody></table>
  
  <div class="form-bot-text">
    <div class="form-bot-01">
    <p>送貨條款</p>
    <ol>
      <li>有料到網站(下稱本網站)送貨服務只適用於香港境內。</li>
        <li>除特別列明， 購物滿HK$3000或以上，將享有免費送貨, 須受條款限制。 (重物如 磚頭，英泥，鋼材，砂石, 木材等運費由顧客支付。)</li>
        <li>沒有升降機服務之送貨地址，送貨服務只限於地下交收。</li>
        <li>送貨不包括貨車不能直達門口的地址。(若貨車無法進入村路, 則於村口交收)</li>
        <li>如送貨當天遇上惡劣天氣，嚴重水浸，道路阻塞或封閉，送貨服務將有可能延誤或暫停，本網站將不會承擔因此引致任何索償及責任。</li>
        <li>如在送貨當日，因送貨地址無人應門或簽收，我們將會收取重送費用。</li>
        <li>如收到的貨品與所訂不符或已損壞, 請立即聯絡本網站處理。</li>
        <li>送貨不包括禁區及大嶼山(香港國際機場、東涌、愉景灣、梅窩除外)。</li>
        <li>梅窩﹑南丫島﹑坪州﹑長州, 貨物交中環碼頭, 不包括搬貨落船, 請自行聯絡船家或相關人士。部分產品不提供此服務。</li>
       <li>機場，馬灣，東涌， 愉景灣， 西貢須付附加費。</li>
    </ol>
    </div>
    
    <div class="form-bot-01 txt-two">
    <p>一般條款</p>
    <ol>
      <li>在極少情況下，可能因供應商缺貨或其他理由無法如期發貨，本網站將盡快通知客戶有關安排, 本網站將不會承擔因此引致任何索償及責任。</li>
        <li>雖然本網站已盡力減少實物與展示的色差,但仍然無法避免色差存在, 本網站將不會承擔因此引致任何索償及責任。</li>
        <li>沒有升降機服務之送貨地址，送貨服務只限於地下交收。</li>
        <li>本網站只在 送錯貨 / 送漏貨 / 送貨時貨品損壞 情況下提供無償退款(客戶必須提供損壞照片)，本網站保留最終決定權。</li>
        <li>所有非客戶訂購的貨品必須保持完整, 以便日後本公司派人回收。</li>
        <li>如有任何爭議, 本網站保留最終決定權。</li>

    </ol>
    </div>
    

    <div class="buttons" style="border: 1px solid #CDDDDD;background-color: #CDDDDD;color: black;padding: 10px 15px;width: 35px;font-size: 16px;">
      <a  onclick="explodePDF('<?php echo $k+1; ?>')" class="button" style="cursor:pointer;">導出</a>
    </div>
   
  </div>
</div>
<?php } ?>
</body>
</html>
<script type="text/javascript" src="view/javascript/html2canvas.js"></script>
<script type="text/javascript" src="view/javascript/jsPdf.debug.js"></script>
<script type="text/javascript" src="view/javascript/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript">

      function explodePDF(con){
        var _k = con;
        var targetDom = $("#contentss"+_k);  

        var copyDom = targetDom.clone();  

        copyDom.width(targetDom.width() + "px");

        copyDom.height(targetDom.height() + "px"); 

        $('body').append(copyDom); 

        html2canvas(copyDom, {
              onrendered:function(canvas) {
                  //console.log(copyDom);
                  var contentWidth = canvas.width;
                  var contentHeight = canvas.height;

                  //一页pdf显示html页面生成的canvas高度;
                  var pageHeight = contentWidth / 595.28 * 841.89;
                  //未生成pdf的html页面高度
                  var leftHeight = contentHeight;
                  //pdf页面偏移
                  var position = 0;
                  //a4纸的尺寸[595.28,841.89]，html页面生成的canvas在pdf中图片的宽高
                  var imgWidth = 555.28;
                  var imgHeight = 555.28/contentWidth * contentHeight;

                  var pageData = canvas.toDataURL('image/jpeg', 1.0);

                  var pdf = new jsPDF('', 'pt', 'a4');
                  pdf.fillStyle = "#fff";
                  //有两个高度需要区分，一个是html页面的实际高度，和生成pdf的页面高度(841.89)
           
                  //当内容未超过pdf一页显示的范围，无需分页
                  if (leftHeight < pageHeight) {
                      pdf.addImage(pageData, 'JPEG', 20, 0, imgWidth, imgHeight );
                  } else {
                      while(leftHeight > 0) {
                          pdf.addImage(pageData, 'JPEG', 20, position, imgWidth, imgHeight)
                          leftHeight -= pageHeight;
                          position -= 841.89;
                          //避免添加空白页
                          if(leftHeight > 0) {
                              pdf.addPage();
                          }
                      }
                  }
                  pdf.save('<?php echo $text_invoice; ?>.pdf');
                  copyDom.remove();
                  
              },
              background: "#fff"
          })


      }

</script>