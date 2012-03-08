<?php $this->i('header',array('title'=>'Autorisation prelevement '.$commande->ref))?>
<div style="margin-left:200;width:60%;border:2px solid #000000;text-align:center">
  <h2>Formulaire de demande et d'autorisation de prélèvement</h2>
  <p>
  Complétez et signez les deux parties de ce formulaire, <br />
  n'oubliez pas de <b>joindre votre RIB</b>
  </p>
</div>
<h2>DEMANDE DE PRELEVEMENT  </h2>
<p>La présente demande est valable jusqu'à annulation de ma part à notifier en temps voulu au créancier.</p>
<table width="100%" border="1" bordercolor="#000">
  <tr>
    <td>
      <p align="center">NOM, PRENOM ET ADRESSE DU DEBITEUR (l'abonné) </p>
      Nom : __________________ Prénom : ___________________<br />
      Adresse :_______________________________________ <br />
      Code postal :______________ Ville :________________ 
    </td>
    <td>
      DESIGNATION DE L'ETABLISSEMENT  TENEUR DU 
      COMPTE A DEBITER (nom de la banque de l'abonné) <br />
      Nom Banque :_________________________________  
    </td>
  </tr>
  <tr>
    <td>
      <p align="center">COMPTE A DEBITER</p>
      <h3 align="center">
      <?php if(!empty($codebanque)):?>
        <?php echo $codebanque?> <?php echo $codeguichet?> <?php echo $numcompte?> <?php echo $clerib?>
      <?php else:?>
        <img src="<?php echo APP_ROOT.WEB_FOLDER?>/images/barres_prelev.png"/>
      <?php endif?>
        </h3>
    </td>
    <th>
      <p align="center">NOM ET ADRESSE DU CREANCIER</p>
                  Sat2way <br />
                  BP 12 <br />
                  64350 LEMBEYE<br />
    </td>
  </tr>
<tr>
  <td colspan="2">
    <p>Les informations contenues dans la présente demande ne seront utilisées que pour les seules nécessités de la gestion. 
    Conformément à la loi Informatique et Libertés du 06/01/78 et à la délibération n° 80 du 1/4/80 de la commission informatique 
    et libertés, vous disposez d'un droit d'accès et de rectification des données vous concernant et vous pouvez exercer votre droit 
    individuel d'accès auprès de Sat2way à l'adresse ci-dessus. </p>
  </td>
</table>
<br />
<i>Date et signature:</i>
<br /><br /><br /><br /><br />
<hr style="border:2px solid #000000" />
<table width="100%" border="1" bordercolor="#000">
  <tr>
    <td width="75%">
      <b>AUTORISATION DE PRELEVEMENT</b>  J'autorise l'établissement teneur de mon compte 
      à prélever sur ce dernier, si sa situation le permet, tous les prélèvements ordonnés 
      par le créancier désigné ci-dessous. En cas de litige sur un prélèvement je pourrai en 
      faire suspendre l'exécution par simple demande à l'établissement teneur de mon compte. 
      Je réglerai le différend directement avec le créancier.
    </td>
    <th>NUMERO 
    NATIONAL 
    D'EMETTEUR  <br />
    <h3>476281</h3>
    </th>
  </tr>
</table>
<br /><br />
<table width="100%" border="1" bordercolor="#000">
    <tr>
      <td width="50%">
        <p align="center">NOM, PRENOM ET ADRESSE DU DEBITEUR (l'abonné) </p>
        Nom : __________________ Prénom : ___________________<br />
        Adresse :_______________________________________ <br />
        Code postal :______________ Ville :________________ 
      </td>
      <th>
        NOM ET ADRESSE DU CREANCIER<br /><br />
                    Sat2way <br />
                    BP 12 <br />
                    64350 LEMBEYE<br />

      </th>
    </tr>
    <tr>
      <td>
        <p align="center">COMPTE A DEBITER</p>
        <h3 align="center">
        <?php if(!empty($codebanque)):?>
          <?php echo $codebanque?> <?php echo $codeguichet?> <?php echo $numcompte?> <?php echo $clerib?>
        <?php else:?>
          <img src="<?php echo APP_ROOT.WEB_FOLDER?>/images/barres_prelev.png"/>
        <?php endif?>
          </h3>
      </td>
      <td>
        <h5 align="center">NOM ET ADRESSE POSTALE DE L'ETABLISSEMENT 
        TENEUR DU COMPTE A DEBITER</h5>
        <p align="left">
        Banque : _________________________________  <br />
        Adresse: _________________________________  <br />
        Code Postal :______________Ville :_________________
        </p>
      </td>
    </tr>    
</table>
<h3>DATE:__________________ Signature :</h3>
