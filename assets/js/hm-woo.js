/* Hartwell Mart: WooCommerce glue. Cart qty steppers auto-update the cart; refresh cart badge. */
jQuery(function($){
  var t;
  $(document.body).on('change','.woocommerce-cart-form .hm-qty input',function(){
    clearTimeout(t); t=setTimeout(function(){ $('[name="update_cart"]').prop('disabled',false).trigger('click'); },600);
  });
  // Re-bind steppers on AJAX-replaced cart markup.
  $(document.body).on('click','.woocommerce-cart-form .hm-qty button',function(e){
    if($(this).data('hmBound'))return;
  });
  $(document.body).on('updated_wc_div',function(){
    document.querySelectorAll('.woocommerce-cart-form .hm-qty').forEach(function(q){
      var i=q.querySelector('input');
      q.querySelectorAll('button').forEach(function(b){ b.onclick=function(){ i.value=Math.max(+i.min||0,(+i.value||1)+(+b.dataset.step)); i.dispatchEvent(new Event('change',{bubbles:true})); }; });
    });
  });
});
/* QA B6/B7: mega menu opens on hover (desktop pointers) and closes on outside click. */
(function(){
  var items=[].slice.call(document.querySelectorAll('.hm-dept__item'));
  function setOpen(li,open){var b=li.querySelector('[data-hm-mega]'),p=b&&document.getElementById(b.getAttribute('aria-controls'));if(!p)return;b.setAttribute('aria-expanded',open?'true':'false');p.classList.toggle('is-open',open);}
  function closeAll(except){items.forEach(function(li){if(li!==except)setOpen(li,false);});}
  var canHover=window.matchMedia('(hover:hover) and (pointer:fine) and (min-width:761px)');
  items.forEach(function(li){var t;
    li.addEventListener('mouseenter',function(){if(!canHover.matches)return;clearTimeout(t);closeAll(li);setOpen(li,true);});
    li.addEventListener('mouseleave',function(){if(!canHover.matches)return;t=setTimeout(function(){setOpen(li,false);},180);});
  });
  document.addEventListener('click',function(e){if(!e.target.closest('.hm-dept__item'))closeAll(null);},true);
})();
/* QA: after Esc closes a mega panel, return focus to its trigger. */
window.addEventListener('keydown',function(e){
  if(e.key!=='Escape')return;
  var open=document.querySelector('[data-hm-mega][aria-expanded="true"]');
  if(open)setTimeout(function(){open.focus();},0);
},true);
/* Contact form: client-side validation with inline errors (server-side validation stays). */
(function(){
  var f=document.getElementById('hm-contact'); if(!f||f.tagName!=='FORM')return;
  var re=/^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
  var rules={
    hm_name:function(v){return v.trim().length>=2?'':'Please enter your full name.';},
    hm_email:function(v){v=v.trim();return !v?'Please enter your email address.':(re.test(v)?'':'Please enter a valid email address, like name@example.com.');},
    hm_topic:function(v){return v?'':'Please select a topic.';},
    hm_message:function(v){v=v.trim();return v.length>=10?'':(v?'Please add a little more detail (at least 10 characters).':'Please enter your message.');}
  };
  function show(el,msg){var id=el.id+'-err',m=document.getElementById(id);
    if(msg){if(!m){m=document.createElement('p');m.id=id;m.className='hm-field__err';el.insertAdjacentElement('afterend',m);}m.textContent=msg;el.setAttribute('aria-invalid','true');el.setAttribute('aria-describedby',id);}
    else{if(m)m.remove();el.removeAttribute('aria-invalid');el.removeAttribute('aria-describedby');}}
  function check(el){var msg=rules[el.name](el.value||'');show(el,msg);return !msg;}
  Object.keys(rules).forEach(function(n){var el=f.elements[n];if(!el)return;
    el.addEventListener('blur',function(){if(el.value||el.hasAttribute('aria-invalid'))check(el);});
    ['input','change'].forEach(function(ev){el.addEventListener(ev,function(){if(el.hasAttribute('aria-invalid'))check(el);});});});
  f.addEventListener('submit',function(e){var first=null;Object.keys(rules).forEach(function(n){var el=f.elements[n];if(el&&!check(el)&&!first)first=el;});if(first){e.preventDefault();first.focus();}});
})();
