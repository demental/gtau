<?php $this->i('header',array('title'=>'Autorisation cb '.$commande->ref))?>
<p>Les informations contenues dans la présente demande ne seront utilisées que pour les seules 
nécessités de la gestion et pourront donner lieu à exercice du droit individuel d'accès auprès du créancier à l'adresse ci-dessus, 
dans les conditions prévues par la délibération n° 80 du 1/04/1980 de la Commission Informatique et Liberté.</p>
<br /><br />
<hr />
<br /><br />
<table width="100%" border="4" bordercolor="#cccccc" style="border-collapse:collapse" cellpadding="15">
  <tr>
    <th width="50%">PAIEMENT CB Visa OU Mastercard</th>
    <th width="50%" bgcolor="#cccccc">&nbsp;</th>
  </tr>
  <tr>
    <td>
      J'autorise l'Etablissement teneur de mon compte à 
      prélever sur ce dernier, si sa situation le permet, mon 
      abonnement par facture, au créancier SAT2WAY
    </td>
    <th>
      <h3>Nom du porteur de la carte</h3>
    </th>
  </tr>
  <tr>
    <td>En cas de litige sur un prélèvement, je pourrai en faire 
  suspendre l'exécution par simple demande à 
  l'Etablissement teneur du compte. Je réglerai le différend 
  directement avec le créancier.
    </td>
    <td><h4>Nom : _________________________<br />
      Prénom : ______________________<br />
      Adresse : _____________________<br />
      CP : __________<br />
      Ville : ______________________<br />
      </h4>
    </td>  
  </tr>
  <tr>
    <th bgcolor="#cccccc">
      &nbsp;
    </th>  
    <th bgcolor="#cccccc">
      Nom et adresse du créancier
    </th>
  </tr>
  <tr>
    <td><?php if(!$typecarte):?><i><u>Barrer la carte inutile</u></i><br /><?php else:?>Type carte<?php endif?>
      <h3 align="center">
        <?php if($typecarte):?><?php echo $typecarte?><?php else:?>VISA<br />EUROCARD/MASTERCARD<?php endif?>
      </h3>  
    </td>
    <td>
      <h4 align="center">
        Sat2Way<br />
        BP 12<br />
        64350 Lembeye
      </h4>
    </td>
  </tr>
  <tr>
    <th bgcolor="#cccccc">
      Infos carte
    </th>
    <td bgcolor="#cccccc">
    </td>
  </tr>
  <tr>
    <th>N° CARTE</th>
    <th>EXP MOIS ANNEE</th>
  </tr>
  <tr>
    <td>&nbsp;<h3 align="center"><?php echo $numcarte?></h3></td>
    <td>&nbsp;<h3 align="center"><?php printf('%02d',$date_expiration['m']);echo '-'.$date_expiration['Y']?></h3></td>
  </tr>
  <tr>
    <th><h3>3 derniers chiffres du numéro 
    imprimé au dos (Cryptogramme 
    Visuel)</h3></th>
    <td>&nbsp;<h3 align="center"><?php echo $CVV?></h3></td>
  </tr>
</table>
<br />
<br />
<br />
<i>Date et signature:</i>    