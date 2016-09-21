<!--MODAL ARQUIVO-->
<div class="modal fade" id="mdImprime" role="dialog" tabindex='-1'>
    <div id="mdImprimeTamanho" class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mdImprimeTitulo">Impressão de etiqueta</h4>
            </div>
            <div class="modal-body">
                <h4><span>Selecione a localização da impressão na página de etiquetas</span></h4>
                <form action="api/processo/imprime" method="post"  id="formImprime">
                    {!! csrf_field() !!}
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="1" >1</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="2" >2</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="3" >3</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="4" >4</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="5" >5</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="6" >6</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="7" >7</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="8" >8</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="9" >9</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="10" >10</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="11" >11</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="12" >12</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="13" >13</button>
                    	</div>

                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="14" >14</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="15" >15</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="16" >16</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="17" >17</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="18" >18</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="19" >19</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="20" >20</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="21" >21</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="22" >22</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="23" >23</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="24" >24</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="25" >25</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="26" >26</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="27" >27</button>
                    	</div>
                    </div>
                    <div class="row">
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="28" >28</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="29" >29</button>
                    	</div>
                    	<div class="col-xs-4 col-sm-4 col-md-4">
                    		<button style="height: 41px; width: 100px;" type="submit" id="pos" name ="pos" value="30" >30</button>
                    	</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
