<div class="row">
    <div class="col-12">
    	<div class="page-title-box">
    		<div class="row pull-right"></div>
    		<div class="row" style="margin: 30px 0 20px 0;">
    			<div class="col-md-2 col-xs-12">
    				<h4
    					style="font-size: 20px; font-weight: 600; margin: 4px 0 15px;">DASHBOARD</h4>
    			</div>
    			<div class="col-md-2 col-xs-12">
    				<div id="divreward" style="display: none">
    					<img id="imgreward"
    						style="width: 200px; padding-bottom: 20px; padding-top: 0x; margin: 0 auto; text-align: center;"
    						class="img-responsive ">
    				</div>
    			</div>
    			<div class="col-md-8 col-xs-12">
    				<div class="row">
    					<div class="col-md-3 col-xs-5">
    						<p
    							style="text-align: right; padding: 4px 10px; color: #ffffff; background: #f73104; border-top-left-radius: 60px;">
    							Referral Link :</p>
    					</div>
    					<div class="col-md-6 col-xs-7">
    						<div class="input-group input-group-sm"
    							style="margin-bottom: 8px;">
    							<input class="form-control" id="regRefLink" type="text"
    								value="http://admin.ymd1000us.com/view/registration_tree.php?ref=<?php echo $_SESSION['loginid']?>"
    								id="myInput"
    								style="background-color: rgb(255, 255, 255); font-size: 14px; color: #525252;">
    							<span class="input-group-btn ">
    								<button class="btn btn-success btn-flat"
    									onclick="copyRegLink()" onmouseout="outFunc()"
    									data-copytarget="#regRefLink">
    									<span class="tooltiptext" id="myTooltip"
    										style="display: none;">Copy to clipboard</span> Copy
    								</button>
    							</span>
    							<!-- <div class="tooltip">
                                                    <button class="btn btn-success btn-flat" onclick="copyRegLink()" onmouseout="outFunc()">
                                                      <span class="tooltiptext" id="myTooltip">Copy to clipboard</span>
                                                      Copy text
                                                      </button>
                                                    </div>-->
    						</div>
    					</div>
    
    				</div>
    			</div>
    		</div>
    		<div class="row" style="margin-bottom: 20px;">
    			<div class="col-md-2 col-xs-4">
    				<h3 class="box-title"
    					style="font-size: 16px; background: #3b146f; padding: 18px 20px; margin: 0; font-weight: bold; color: white; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
    					<span class="hidden-xs">LATEST</span> NEWS
    				</h3>
    			</div>
    			<div id="form_1" class="col-md-10 col-xs-10">
    				<marquee loop="true" behavior="scroll" direction="left"
    					scrolldelay="60" scrollamount="2"
    					style="margin-top: 0px; height: 54px; padding: 6px; border-top-right-radius: 10px; box-shadow: 1px 1px 3px #c0c0c0; background: white; border-bottom-right-radius: 10px;"
    					onmouseover="this.stop();" onmouseout="this.start();">
    					<div class="comment-text" style="color: black;">
    						<span class="username" style="color: #c3602b;"><i
    							class="fa fa-info-circle"></i>&nbsp;YMD 1000 US. </span> <br>
    						<p><?php echo $metrics['news']['news']; ?></p>
    					</div>
    					<hr>
    					<!--<div class="comment-text" style="color: black;">
                                                    <span class="username" style="color: #c3602b;"><i class="fa fa-info-circle"></i>&nbsp;way2startup.org
                                                    </span>
                                                    <br>
                                                    Wel-Come to 4WAYDIAL LTD.
                                                </div>
                                                <hr>-->
    
    				</marquee>
    			</div>
    			
    		</div>
    		<!-- end row -->
    		</div>
    	</div>
    </div>