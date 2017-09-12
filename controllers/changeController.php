<?php

    class changeController extends ActionController
    {
        # -------------------------------------------------------
        protected $opo_config; // plugin configuration file
        # -------------------------------------------------------
        #
        # -------------------------------------------------------
        public function __construct(&$po_request, &$po_response, $pa_view_paths = null)
        {
            parent::__construct($po_request, $po_response, $pa_view_paths);

            $ps_plugin_path = __CA_BASE_DIR__ . "/app/plugins/changeParent";

            if (file_exists($ps_plugin_path . '/conf/local/changeParent.conf')) {
                $this->opo_config = Configuration::load($ps_plugin_path . '/conf/local/changeParent.conf');
            } else {
                $this->opo_config = Configuration::load($ps_plugin_path . '/conf/changeParent.conf');
            }
        }


        # -------------------------------------------------------
        public function collection() {
            //$this->view->setVar('folders_contents', $folders_contents);

            $this->render('change_collection_parent_html.php');
        }
    }