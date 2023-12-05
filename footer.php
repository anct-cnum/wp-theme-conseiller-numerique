<?php
/**
 * Footer
 */
?>
<footer class="fr-footer" role="contentinfo" id="footer">
  <div class="fr-container">
    <div class="fr-footer__body fr-footer__body--operator">
      <div class="fr-footer__brand fr-enlarge-link footer-brand-custom">
        <a class="fr-footer__brand-link" href="https://www.conseiller-numerique.gouv.fr" title="Retour à l&rsquo;accueil">
          <img src="<?php bloginfo('template_url'); ?>/logos/logo-france-relance-gouv-ue.png" alt="Logo France Relance" class="logo-france-relance fr-footer__logo" />
        </a>
      </div>
      <div class="fr-footer__content footer-content-custom">
        <ul class="fr-footer__content-list footer-list-custom fr-mb-2w">
          <li class="fr-footer__content-item">
            <a href="https://www.conseiller-numerique.gouv.fr/kit-communication" title="kit communication" class="fr-footer__content-link">
              Kit de communication
          </a>
          </li>
          <li class="fr-footer__content-item">
            <a
              class="fr-footer__content-link"
              title="Statistiques"
              href="https://metabase.conseiller-numerique.gouv.fr/public/dashboard/446208c4-cae2-4c0c-be19-44cb14ce7d06"
              target="_blank" rel="noopener noreferrer">Statistiques</a>
          </li>
          <li class="fr-footer__content-item">
            <a
              title="France services"
              class="fr-footer__content-link"
              href="https://www.cohesion-territoires.gouv.fr/france-services"
              target="_blank" rel="noopener noreferrer">France services</a>
          </li>
        </ul>
        <ul class="fr-footer__content-list">
          <li class="fr-footer__content-item">
            <a class="fr-footer__content-link" href="https://legifrance.gouv.fr" target="_blank" rel="noopener noreferrer">legifrance.gouv.fr</a>
          </li>
          <li class="fr-footer__content-item">
            <a class="fr-footer__content-link" href="https://gouvernement.fr" target="_blank" rel="noopener noreferrer">gouvernement.fr</a>
          </li>
          <li class="fr-footer__content-item">
            <a class="fr-footer__content-link" href="https://service-public.fr" target="_blank" rel="noopener noreferrer">service-public.fr</a>
          </li>
          <li class="fr-footer__content-item">
            <a class="fr-footer__content-link" href="https://data.gouv.fr" target="_blank" rel="noopener noreferrer">data.gouv.fr</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="fr-footer__partners" style="box-shadow: none">
      <h4 class="fr-footer__partners-title" style="font-weight: 400; color: #3A3A3A">
        Dispositif pilot&eacute; et op&eacute;rationnalis&eacute; par&nbsp;:
      </h4>
      <div class="fr-footer__partners-logos">
        <div class="fr-footer__partners-main">
          <a class="footer__partners-link" href="https://societenumerique.gouv.fr/fr/">
            <img class="fr-footer__logo" style="height: 72px" src="<?php bloginfo('template_url'); ?>/logos/logo-sonum-anct-min.svg" alt="Agence Nationale de la Coh&eacute;sion des Territoires - Soci&eacute;t&eacute; num&eacute;rique" />
          </a>
        </div>
      </div>
    </div>
    <div class="fr-footer__bottom">
      <ul class="fr-footer__bottom-list">
        <li class="fr-footer__bottom-item">
          <a
            href="https://cdn.conseiller-numerique.gouv.fr/accessibilite"
            title="Accessibilit&eacute;"
            class="fr-footer__bottom-link">Accessibilit&eacute;: non conforme</a>
        </li>
        <li class="fr-footer__bottom-item">
          <a
            href="https://www.conseiller-numerique.gouv.fr/mentions-legales"
            title="Mentions L&eacute;gales"
            class="fr-footer__bottom-link">Mentions l&eacute;gales</a>
        </li>
        <li class="fr-footer__bottom-item">
          <a href="https://cdn.conseiller-numerique.gouv.fr/CGU-Donn%C3%A9es_personnellesConseiller_Num%C3%A9rique.pdf"
            class="fr-footer__bottom-link"
            title="Donn&eacute;es personnelles"
            target="_blank" rel="noopener noreferrer">Donn&eacute;es personnelles</a>
        </li>
      </ul>
      <div class="fr-footer__bottom-copy">
        <p>
          Sauf mention contraire, tous les contenus de ce site sont sous&nbsp;
          <a
            href="https://github.com/etalab/licence-ouverte/blob/master/LO.md"
            target="_blank" rel="noopener noreferrer"
            title="Licence etalab">licence etalab-2.0</a>
        </p>
      </div>
    </div>
  </div>
</footer>
<script type="module" src="<?php bloginfo('template_url'); ?>/dsfr.module.min.js"></script> <!-- ne pas passé en register sinon burger menu HS !-->
<script type="text/javascript" nomodule src="<?php bloginfo('template_url'); ?>/dsfr.nomodule.min.js"></script>
<?php wp_footer() ?>
</body>
</html>
