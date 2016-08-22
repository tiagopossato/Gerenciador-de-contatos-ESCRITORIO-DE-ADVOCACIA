<!--MODAL ARQUIVO-->
<div class="modal fade" id="mdImprime" role="dialog" tabindex='-1'>
    <div id="mdImprimeTamanho" class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mdImprimeTitulo">Impressão de etiqueta</h4>
            </div>
            <div class="modal-body">
                <h4>Selecione a localização da impressão na página de etiquetas</h4>
                <form action="api/processo/imprime" method="post"  id="formImprime">
                    {!! csrf_field() !!}
                    <table style="height: 210px; width: 297px;">
                        <tr>
                            <td valign="middle" style="height: 99px; width: 92px;">
                                <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="1" >1</button>
                            </td>
                            <td valign="middle" style="height: 99px; width: 92px;">
                                <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="2" >2</button>
                            </td>
                        </tr>
                        <tr>
                            <td valign="middle" style="height: 99px; width: 92px;">
                                <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="3" >3</button>
                            </td>

                            <td valign="middle" style="height: 99px; width: 92px;">
                                <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="4" >4</button>
                            </td>
                        </tr>
                        <td valign="middle" style="height: 99px; width: 92px;">
                            <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="5" >5</button>
                        </td>
                        <td valign="middle" style="height: 99px; width: 92px;">
                            <button style="height: 89px; width: 82px;" type="submit" id="pos" name ="pos" value="6" >6</button>
                        </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>