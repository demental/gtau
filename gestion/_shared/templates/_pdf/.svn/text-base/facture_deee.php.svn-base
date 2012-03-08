<?php $this->i('header',array('title'=>'Facture '.$facture->ref))?>

<table width="100%" class="headtable">
  <tr>
    <td>&nbsp;</td><th colspan="2">Facture/Invoice</th>
  </tr>
  <tr>
    <td rowspan="6" width="50%">
      <img src="<?php echo APP_ROOT.WEB_FOLDER?>/images/logo_pdf.png" />
    </td>
  </tr>
  <tr><td width="25%">Facture num/invoice #:</td><td width="25%"><?php echo $facture->ref?></td></tr>
  <tr><td width="25%">Ref client/Customer ref:</td><td width="25%"><?php echo $facture->getLink('client_id')->ref?></td></tr>  
  <tr><td>Commande/Salesorder:</td><td><?php echo $facture->getLink('commande_id')->ref?></td></tr>
  <tr><td>Date de facturation/Invoice date:</td><td><?php echo date('d/m/Y',strtotime($facture->date))?></td></tr>
  <tr><td>TVA Intracommunautaire/VAT number:</td><td><?php echo Config::getPref('tvaintl')?></td></tr>
</table>
<br />
<br />
<table class="adresses" width="70%">
<tr>
  <th width="50%">Facturé à / Billed to</th><th width="50%">Expédié à / Sent to</th>
</tr>
<tr>
  <td><?php echo nl2br($facture->adresse_facturation)?></td>
  <td><?php echo nl2br($facture->adresse_livraison)?></td>
</tr>
</table>
<br />
<br />
<table class="details" width="100%">
  <tr>
    <th width="10%"></th>
    <th width="7%">Qté/Qty.</th>
    <th width="43%">Produit/Product</th>
    <th width="5%">Cat. DEEE*</th>
    <th width="12%">Prix unitaire/Unit price sans/without DEEE</th>
    <th width="12%">Prix unitaire/Unit price avec/with DEEE</th>

    <th width="15%">Prix total/Total amount</th>
  </tr>
<?php foreach($facture->getLines() as $line):?>
  <tr>
    <td><?php echo $line->ref?></td>
    <td><?php echo $line->qtte?></td>
    <td><?php echo nl2br(wordwrap($line->designation))?></td>
    <td><?php echo $line->ecocat?></td>
    <td align="right"><?php echo Calc::money($line->pu)?></td>
    <td align="right"><?php echo Calc::money($line->ecotaxu+$line->pu)?></td>
    <td align="right"><?php echo Calc::money($line->tot)?></td>
  </tr>
<?php endforeach?>
</table>
<h2 align="center">Total général/Grand total</h2>
<table class="totals" width="100%">
  <tr><td width="50%" rowspan="3">Devise/Currency : EURO</td>
    <td>Sous-total/Subtotal : </td>
    <td><?php echo Calc::money($facture->total)?></td>
  </tr>
  <tr>
    <?php if($facture->ratio_tva==0):?>
      <td colspan="2">Exonération de TVA, article 262 ter I du CGI</td>
    <?php else:?>  
      <td>TVA/VAT <?php echo 100*$facture->ratio_tva?>% : </td>
      <td><?php echo Calc::money($facture->total*$facture->ratio_tva)?></td>
    <?php endif?>
  </tr>
  <tr>
    <td>Total : </td>
    <td><b><?php echo Calc::money($facture->totalttc)?></b></td>
  </tr>
</table>
<br />
<hr />
<table class="totals" width="100%">
  <?php foreach($facture->getPostlines() as $line):?>
    <tr><td width="75%" align="right"><?php echo $line->designation?></td><td><?php echo Calc::money($line->prix)?></td></tr>
  <?php endforeach?>
</table>    
<br />
<small>
<table class="tabnote" width="100%">
  <tr><td rowspan="6" width="75%">
<p class="foot"><?php echo nl2br(wordwrap(Config::getPref('facturefoot'),160))?>.<br />
  <strong><em>
    * Ci-contre l'information sur les coûts unitaires d'élimination des déchets d'équipements électriques et électroniques  
     conformément au décret du 20 juillet 2005 et l'article 
    L.541-10-2 du code de l'environnement.
  </em></strong></p>
</td><th>Contribution DEEE catégories</th><th>Coût unitaire HT</th></tr>
<tr><th>A</th><th>10,87</th></tr>
<tr><th>B</th><th>6,69</th></tr>
<tr><th>C</th><th>3,34</th></tr>
<tr><th>D</th><th>0,42</th></tr>
<tr><th>E</th><th>0,084</th></tr>
</table>
</small>