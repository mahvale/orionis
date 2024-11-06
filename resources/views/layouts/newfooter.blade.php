<script type="text/javascript">
	$(function() {
	    $('.nav-link').click(function(e) {
        e.preventDefault();
    
        let href = $(this).attr('href');
        let tabs_menu = $(this).attr('data-tabs-menu');
        $('#menu_tabs').val(tabs_menu)
            if (tabs_menu == 'forum') {$("#navigation-t").hide('400')}
            if (tabs_menu == 'epreuves') {$("#navigation-t").hide('400')}
            if (tabs_menu == 'cours') {$("#navigation-t").show('400')}
            if (tabs_menu == 'td') {$("#navigation-t").show('400')}
            if (tabs_menu == 'tp') {$("#navigation-t").show('400')}
            if (tabs_menu == 'exercices') {$("#navigation-t").show('400')}
            if (tabs_menu == 'evaluation') {$("#navigation-t").show('400')}
        console.log(tabs_menu)
        // Ajouter les classes 'show' et 'active' à l'onglet sélectionné
        $(href).addClass('show active');
        // Retirer les classes 'show' et 'active' des autres onglets
        $('.tab-pane').not(href).removeClass('show active');

        // Gérer l'état actif des onglets du menu
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
    });
	});
</script>