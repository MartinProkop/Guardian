<?php
            echo "
<script type=\"text/javascript\">
$(document).ready(function()
{
   $('#tooltip_$row[id]').qtip(
   {
      content: {
        text: '".ereg_replace("[\r|\n]+","<br>",$row[popis])."',
        title: {
            text: 'popis úkolu',
            button: 'Close'
        }
      },
      hide: {
        when: {
            event: 'unfocus'
        }
      },
      show: {
        solo: true,
        when: {
            event: 'click'
        }
      },
      style: {
          width: {
             min: 250,
             max: 400
          },
          padding: 5,
          background: '#c0d3e2',
          textAlign: 'left',
          border: {
            width: 2,
            color: '#c0d3e2'
          },
          title: {
            background: '#f9f9ff',
          }
      },
      adjust: {
            scroll: true,
            resize: true
      }
   });
});
</script>
";
?>

du auditu s payicov8n9m>

			<td><a href=\"#tooltip_" . $row['id'] . "\" name=\"tooltip_" . $row['id'] . "\"  id=\"tooltip_" . $row['id'] . "\")\"><img src=\"./design/detaily.png\" alt=\"ukázat text\" title=\"ukázat text\"/></a></td>
			</tr>
                            <script type=\"text/javascript\">
                            $(document).ready(function()
                            {
                               $('#tooltip_$row[id]').qtip(
                               {
                                  content: {
                                    text: '".ereg_replace("[\r|\n]+","<br>",$row[komentar])."',
                                    title: {
                                        text: 'Komentář auditu #ID $row[id]',
                                        button: 'Close'
                                    }
                                  },
                                  hide: {
                                    when: {
                                        event: 'unfocus'
                                    }
                                  },
                                  show: {
                                    solo: true,
                                    when: {
                                        event: 'click'
                                    }
                                  },
                                  style: {
                                      width: {
                                         min: 250,
                                         max: 400
                                      },
                                      padding: 5,
                                      background: '#c0d3e2',
                                      textAlign: 'left',
                                      border: {
                                        width: 2,
                                        color: '#c0d3e2'
                                      },
                                      title: {
                                        background: '#f9f9ff',
                                      }
                                  },
                                  adjust: {
                                        scroll: true,
                                        resize: true
                                  },
                                  position: {
                                    corner: {
                                        tooltip: 'bottomRight',
                                        target: 'bottomRight'

                                    }
                                  }
                               });
                            });
                            </script>



                        <img src=\"./design/detaily.png\" alt=\"detaily\" title=\"detaily\"/>
                             <img src=\"./design/detaily.png\"/>
                             <img src=\"./design/edit.png\" alt=\"upravit\" title=\"upravit\" />
                             <img src=\"./design/kos.png\" alt=\"smazat\" title=\"smazat\" />
                             <img src=\"./design/pridat.png\" />    <img src="./design/pridat.png" />
                             <img src=\"./design/pridat.png\" alt=\"přidat\" title=\"přidat\" />
                             <img src=\"./design/nahled.png\" alt=\"smazat\" title=\"smazat\" />
                             <img src=\"./design/nahled.png\" />



                             a validace


           <script type=\"text/javascript\">
           $(document).ready(function(){
             $('#nastaveni').validate({
             rules: {
               email: {
                 required: true,
                 email: true
               },
               telefon: {
                 required: true
               },
               pocet_prvku_zobrazeni: {
                 required: true,
                 min: 1
               }

               }
             });
           });
           </script>