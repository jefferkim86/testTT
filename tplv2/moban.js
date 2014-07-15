<div id="feedText_{bid}" class="content"> 
	{if attr.length > 0} {each attr as m i} {if m.type == \'local\'}
	 <div class="album" id="swf_cover_{bid}_{i}"> 
	 <div class="cover"> 
	 <div class="cover_img">
	 </div> <img src="{m.img}"/>
	  </div> <div class="cover_title">{m.title} - {m.author}</div> 
	  <div class="cover_fun">
	  <a href="javascrpt:void(0)" onclick="window.location.href={urlpath()}/{m.url}"><span class="download">\u4e0b\u8f7d\u97f3\u4e50</span></a>
	  </div> 
	  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="340" height="33"> 
	  <param name="movie" value="{flashpath(m.url)}" /> 
	  <param name="quality" value="high" /> 
	  <param value="transparent" name="wmode" /> 
	  <embed src="{flashpath(m.url)}" width="340" height="33" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash"></embed>
	   </object> 
	   </div> {/if} 
	   {if m.type == \'xiamisearch\' || m.type == \'xiami\'} 
	   <div class="album"> <div class="cover"> 
	   <div class="cover_img"></div> 
	   <img src="{m.img}" /> 
	   </div> 
	   {if m.title != \'null\' && m.author != \'null\'} 
	   <div class="cover_title"> 
	   <a href="{h_url}">{m.title} {m.author}</a> 
	   </div> {/if}
	    <div class="cover_fun"> 
	    <a href="{m.url}" target="_blank">
	    <span class="eject">\u5f39\u51fa\u64ad\u653e</span></a>
	     </div> 
	     {if m.type == \'xiami\'} 
	     <embed src="http://www.xiami.com/widget/0_{m.pid}/singlePlayer.swf" type="application/x-shockwave-flash" width="340" height="33" wmode="transparent"></embed> {else} <embed src="{m.pid}" type="application/x-shockwave-flash" width="340" height="33" wmode="transparent"></embed> {/if} </div> {/if} 
	     {if m.type == \'yinyuetai\'} 
	     <div class="video w240" id="swf_cover_{bid}_{i}"> 
	     <div class="video_bg"> 
	     <div class="video_song">{m.title}</div>
	      <div class="video_name">{m.author}</div> 
	      <a href="javascript:" onclick="load_swf(\'yinyuetai\',{bid},{i},\'{m.title}\',\'{m.pid}\')"> 
	      <div class="video_play"></div>
	      <img src="index.php?c=blog&a=getyytimg&src={m.img}" /> </a> 
	      </div> </div> 
	      <div style="display:none" id="swf_play_{bid}_{i}"></div> {/if} {/each} {/if} 
	      {if body} 
	  <div class="text_area"> <p>{body}</p> </div> {/if} 
	  </div>