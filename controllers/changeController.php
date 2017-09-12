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
            $vn_id = $this->request->getParameter("id",pInteger);
            if(!isset($_POST["record_id"])) {
                //$this->view->setVar('folders_contents', $folders_contents);

                $this->view->setVar('id', $vn_id);
                $this->view->setVar('collection_parent_type', $this->opo_config->get('collection_parent_type'));
                $this->render('change_collection_parent_html.php');
            } else {
                if ($_POST["record_id"] != $vn_id) {
                    die("<b>error</b> Parity checked failed.");
                }
                $parent = $_POST["parent_id"];
                $vt_collection = new ca_collections($vn_id);
                $vt_collection->setMode(ACCESS_WRITE);
                $vt_collection->set("ca_collections.parent_id", $parent);
                $vt_collection->update();
                $va_errors = $vt_collection->getErrors();
                if(count($va_errors)>0) {
                    var_dump($vt_collection->getErrors());
                    die();
                } else {
                    $this->view->setVar('id', $vn_id);
                    $this->view->setVar('parent', $parent);
                    $this->render('changed_collection_parent_html.php');
                }
            }

        }
    }