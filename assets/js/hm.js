(()=>{const $=(s,c=document)=>c.querySelector(s),$$=(s,c=document)=>[...c.querySelectorAll(s)];
// mega menu
$$('[data-hm-mega]').forEach(btn=>{const p=document.getElementById(btn.getAttribute('aria-controls'));
 const set=o=>{$$('[data-hm-mega]').forEach(b=>{if(b!==btn){b.setAttribute('aria-expanded','false');document.getElementById(b.getAttribute('aria-controls')).classList.remove('is-open')}});btn.setAttribute('aria-expanded',o);p.classList.toggle('is-open',o)};
 btn.addEventListener('click',()=>set(btn.getAttribute('aria-expanded')!=='true'));});
document.addEventListener('keydown',e=>{if(e.key==='Escape')$$('[data-hm-mega][aria-expanded=true]').forEach(b=>b.click())});
document.addEventListener('click',e=>{if(!e.target.closest('.hm-dept'))$$('[data-hm-mega][aria-expanded=true]').forEach(b=>b.click())});
// mobile nav
const bg=$('.hm-burger');bg&&bg.addEventListener('click',()=>{const o=bg.getAttribute('aria-expanded')!=='true';bg.setAttribute('aria-expanded',o);$('.hm-dept').classList.toggle('is-open',o)});
// qty
$$('.hm-qty').forEach(q=>{const i=$('input',q);$$('button',q).forEach(b=>b.addEventListener('click',()=>{i.value=Math.max(1,(+i.value||1)+(+b.dataset.step));i.dispatchEvent(new Event('change',{bubbles:true}))}))});
// gallery
$$('.hm-gallery').forEach(g=>{const m=$('.hm-gallery__main',g);$$('.hm-gallery__thumbs button',g).forEach(b=>b.addEventListener('click',()=>{m.src=b.dataset.src;$$('button',g).forEach(x=>x.setAttribute('aria-pressed','false'));b.setAttribute('aria-pressed','true')}))});
// tabs
$$('.hm-tabs').forEach(t=>{const tabs=$$('[role=tab]',t);tabs.forEach((tab,i)=>{tab.addEventListener('click',()=>sel(i));tab.addEventListener('keydown',e=>{if(e.key==='ArrowRight')sel((i+1)%tabs.length);if(e.key==='ArrowLeft')sel((i-1+tabs.length)%tabs.length)})});
 function sel(i){tabs.forEach((x,j)=>{x.setAttribute('aria-selected',i===j);x.tabIndex=i===j?0:-1;document.getElementById(x.getAttribute('aria-controls')).hidden=i!==j});tabs[i].focus()}});
// cart totals
const cart=$('[data-hm-cart]');if(cart){const calc=()=>{let s=0;$$('.hm-line',cart).forEach(l=>{const v=+l.dataset.price*+$('input',l).value;$('.hm-line__sum',l).textContent='$'+v.toFixed(2);s+=v});$('#hm-sub').textContent='$'+s.toFixed(2);$('#hm-tot').textContent='$'+(s).toFixed(2)};cart.addEventListener('change',calc);calc()}
})();
