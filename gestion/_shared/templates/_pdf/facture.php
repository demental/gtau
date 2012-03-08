<?php $this->i('header',array('title'=>'Facture '.$facture->getRef()))?>

<table width="100%" class="headtable">
  <tr>
    <td>&nbsp;</td><th colspan="2">Facture</th>
  </tr>
  <tr>
    <td rowspan="4" width="50%">
      <img src="<?php echo APP_ROOT.WEB_FOLDER?>/images/logo.jpg" /><br />
      <?php echo nl2br(Config::getPref('pdf_entete'))?>
    </td>
  </tr>
  <tr><td width="25%">Facture num :</td><td width="25%"><?php echo $facture->getRef()?> en EUROS</td></tr>
  <tr><td width="25%">Ref client :</td><td width="25%"><?php echo $facture->getLink('client_id')->ref?></td></tr>  

  <tr><td>Date de facturation :</td><td><?php echo date('d/m/Y',strtotime($facture->date))?></td></tr>
</table>
<br />
<br />
<table class="adresses" width="100%">
  <tr>
    <td width="50%">
      &nbsp;
    </td>
  <th width="50%">Facturé à</th>
</tr>
<tr>
  <td width="50%">
    &nbsp;
  </td>
  <td><?php echo nl2br($facture->getLink('client_id')->toHtml())?></td>
</tr>
</table>
<br />
<br />
<br />
<br />
<br />
<br />
<table class="details" width="100%">
  <tr>

    <th width="75%">Désignation</th>
    <th width="25%">Montant</th>
  </tr>
  <tr>
    <td><br /><?php echo nl2br(wordwrap($facture->designation))?><br /></td>
    <td align="right"><br /><?php echo Calc::money($facture->montant)?></td>
  </tr>

</table>

<table class="totals" width="100%">
<?php if($facture->ratio_tva==0):?>
<tr><td><h2 align="center">Total</h2></td><td><h2><?php echo Calc::money($facture->montant)?></h2></td></tr>
  <tr>
      <td colspan="2">
        Exonération de TVA, CGI, art. 261-4 4°
      </td>
  </tr>
<?php else:?>
  <tr><td><h2 align="center">Total HT</h2></td><td><h2><?php echo Calc::money($facture->montant)?></h2></td></tr>
  <tr>
    <td><h2 align="center">TVA 19.6%</h2></td><td><h2>
      <?php echo Calc::money(Calc::HT2TTC($facture->montant,$facture->ratio_tva)-$facture->montant)?>
      </h2>
    </td>
  </tr>
  <tr>
    <td><h2 align="center">Total TTC</h2></td><td><h2>
      <?php echo Calc::money(Calc::HT2TTC($facture->montant,$facture->ratio_tva))?>
      </h2>
    </td>
  </tr>
<?php endif?>    
</table>
<br />
<hr />
<p class="foot"><?php echo nl2br(wordwrap(Config::getPref('facturefoot'),160))?></p>