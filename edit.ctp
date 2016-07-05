<script>
    function calculris() {

        p1 = document.getElementById('effectifs-public').value;
        ap2 = document.getElementById('activite-coefficient');
        p2 = parseFloat(ap2.options[ap2.selectedIndex].text);
        ae1 = document.getElementById('environnement-coefficient');
        e1 = parseFloat(ae1.options[ae1.selectedIndex].text);
        ae2 = document.getElementById('delai-coefficient');
        e2 = parseFloat(ae2.options[ae2.selectedIndex].text);
        pub = document.getElementById('public-type');

        if (p1 <= 100000) {
            p = p1;
        } else if (p1 > 100000) {
            p = 100000 + ((p1 - 100000) / 2);
        }

        i = p2 + e1 + e2;

        ris = i * (p / 1000);

        document.getElementById('public-ris').value = ris;
        console.log(ris);
        switch (true) {
            case ris <= 0.25:
                pub.value = 'PAS DE DISPOSITIF';
                break;
            case 0.25 < ris & ris <= 1.125:
                pub.value = "POINT D'ALERTE ET DE PREMIER SECOURS";
                break;
            case 1.125 <ris & ris <= 12:
                pub.value = "DPS DE PETITE ENVERGURE";
                break;
            case 12 < ris & ris <= 36:
                pub.value = "DPS DE MOYENNE ENVERGURE";
                break;
            case 36 < ris:
                pub.value = "DPS DE GRANDE ENVERGURE";
        }

    }

</script>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $dispositif->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $dispositif->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Dispositifs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Demandes'), ['controller' => 'Demandes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Demande'), ['controller' => 'Demandes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Casernes'), ['controller' => 'Casernes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Caserne'), ['controller' => 'Casernes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Engagements'), ['controller' => 'Engagements', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Engagement'), ['controller' => 'Engagements', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="dispositifs form large-9 medium-8 columns content">
    <?= $this->Form->create($dispositif) ?>
    <fieldset>
        <legend><?= __('Edit Dispositif') ?></legend>
        <?php
            echo $this->Form->input('etat');
            echo $this->Form->input('demande_id', ['options' => $demandes, 'empty' => true]);
            echo $this->Form->input('caserne_id', ['options' => $casernes]);
            echo $this->Form->input('effectifs_public', ['onChange'=>'calculris()']);
            echo $this->Form->input('activite_coefficient', ['options' => $dispositifsActivites, 'onChange'=>'calculris()']);
            echo $this->Form->input('environnement_coefficient', ['options' => $dispositifsEnvironnements, 'onChange'=>'calculris()']);
            echo $this->Form->input('delai_coefficient', ['options' => $dispositifsDelais, 'onChange'=>'calculris()']);


            echo $this->Form->input('public_ris');

            echo $this->Form->input('public_type');
            echo $this->Form->input('public_renfort');
            echo $this->Form->input('public_chef_secteur');
            echo $this->Form->input('public_total');
            echo $this->Form->input('public_recommandations');
            echo $this->Form->input('public_organisation');
            echo $this->Form->input('effectifs_acteurs');
            echo $this->Form->input('acteurs_total');
            echo $this->Form->input('total_secouristes');
            echo $this->Form->input('acteurs_organisation');
            echo $this->Form->input('organisation_generale');
            echo $this->Form->input('organisation_transport');
            echo $this->Form->input('consignes_equipiers');
            echo $this->Form->input('rendez_vous_date', ['empty' => true]);
            echo $this->Form->input('rendez_vous_lieu');
            echo $this->Form->input('poste_ouverture', ['empty' => true]);
            echo $this->Form->input('poste_fermeture', ['empty' => true]);
            echo $this->Form->input('asistes');
            echo $this->Form->input('legers');
            echo $this->Form->input('medicalises');
            echo $this->Form->input('renforts');
            echo $this->Form->input('evacues');
            echo $this->Form->input('remarquebilan');
            echo $this->Form->input('repasmidi');
            echo $this->Form->input('repassoir');
            echo $this->Form->input('repasmatin');
            echo $this->Form->input('repascharge');
            echo $this->Form->input('cout_unitaire');
            echo $this->Form->input('cout_kilometres_vps');
            echo $this->Form->input('cout_kilometres_autres');
            echo $this->Form->input('cout_repas');
            echo $this->Form->input('remise_pourcentage');
            echo $this->Form->input('remise_motif');
            echo $this->Form->input('cout_pourcentage_adpc');
            echo $this->Form->input('cout_adpc');
            echo $this->Form->input('cout_total');
            echo $this->Form->input('cout_remise');
            echo $this->Form->input('responsable_dossier');
            echo $this->Form->input('responsable_telephone');
            echo $this->Form->input('responsable_portable');
            echo $this->Form->input('responsable_fax');
            echo $this->Form->input('responsable_message');
            echo $this->Form->input('responsable_mail');
            echo $this->Form->input('post_it');
            echo $this->Form->input('total_kilometres');
            echo $this->Form->input('total_duree');
            echo $this->Form->input('total_effectifs');
            echo $this->Form->input('accord_adpc');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
