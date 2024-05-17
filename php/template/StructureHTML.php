<?php
    class StructureHTML {
        
        public function getTopStructure($title, $cssLink) {
            return "
            <!DOCTYPE html>
            <html>
                <head>
                    <title>$title</title>

                    <link rel='stylesheet' href=$cssLink>
                </head>

                <body>
            ";
        }

        public function getBottomStructure() {
            return "
                <body>
            </html>
            ";
        }
    }
?>