<?php $this->i('header',array('title'=>'Retour SAV '.$commande->ref))?>

<table width="100%" class="headtable">
  <tr>
    <td>&nbsp;</td><th colspan="2">RETOUR SAV / AFTER SALES SERVICE RETURN</th>
  </tr>
  <tr>
    <td rowspan="6" width="50%">
      <img src="<?php echo APP_ROOT.WEB_FOLDER?>/images/logo_pdf.png" />
    </td>
  </tr>
  <tr><td width="25%">Facture liée/related to invoice #</td><td width="25%"><?php echo $facture->ref?></td></tr>
  <tr><td width="25%">Ref client/Customer ref:</td><td width="25%"><?php echo $commande->getLink('client_id')->ref?></td></tr>  
  <tr><td>Commande/Salesorder:</td><td><?php echo $facture->getLink('commande_id')->ref?></td></tr>
  <tr><td>Date de retour/Return date:</td><td><?php echo date('d/m/Y')?></td></tr>
  <tr><td></td><td></td></tr>
</table>
<br />
<br />
<table class="adresses" width="70%">
<tr>
  <th width="50%">Facturé à / Billed to</th><th width="50%">Expédié à / Consignee</th>
</tr>
<tr>
  <td><?php echo nl2br($commande->getLink('shipping_contact_id')->__toAdr())?></td>
  <td><?php echo nl2br($commande->getLink('billing_contact_id')->__toAdr())?></td>
</tr>
</table>
<h2 align="center">FACTURE PROFORMA / PROFORMA INVOICE</h2>
<br />
<br />
<table class="details" width="100%">
  <tr>
    <th width="10%"></th>
    <th width="7%">Qté/Qty.</th>
    <th width="53%">Produit/Product</th>
    <th width="20%">Code douanier / Customs code</th>
    <th width="10%">Valeur déclarée / Declared value</th>
  </tr>
<?php foreach($facture->getLink('commande_id')->getMachineLines() as $line):?>
  <tr>
    <td><?php echo $line->ref?></td>
    <td><?php echo $line->qtte?></td>
    <td><?php echo nl2br(wordwrap($line->getLink('article_id')->description_rsav,60))?><br />
      <em>Pays d'origine / Country of origin: FRANCE</em></td>
    <td><?php echo $line->getLink('article_id')->numtarifaire?></td>
    <td align="right"><?php echo number_format($line->puht*$line->qtte,2)?></td>
  </tr>
<?php endforeach?>
  <tr>
    <td></td>
    <td></td>
    <td><br /><br /><strong>SANS VALEUR COMMERCIALE	
     / VALEUR POUR LA DOUANE UNIQUEMENT<br /><br />	



    FREE OF CHARGE	
    NO COMMERCIAL VALUE / 	
    VALUE FOR CUSTOMS PURPOSES ONLY	</strong>
    </td>
    <td></td>
    <td></td>
  </tr>    
</table>
<br />
<hr />
<br />