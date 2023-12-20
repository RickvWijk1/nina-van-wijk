import{H as _,u as q,I as b,r as x,J as A,M as k,N as L,h as T,O as N,v as C,Q as B,U as E,V as U,W as w,X as I,Y as O,Z as V,$ as j,a0 as D,A as P,a1 as M}from"./entry.f8c953a9.js";async function R(a,n=_()){const{path:o,matched:e}=n.resolve(a);if(!e.length||(n._routePreloaded||(n._routePreloaded=new Set),n._routePreloaded.has(o)))return;const l=n._preloadPromises=n._preloadPromises||[];if(l.length>4)return Promise.all(l).then(()=>R(a,n));n._routePreloaded.add(o);const i=e.map(s=>{var t;return(t=s.components)==null?void 0:t.default}).filter(s=>typeof s=="function");for(const s of i){const t=Promise.resolve(s()).catch(()=>{}).finally(()=>l.splice(l.indexOf(t)));l.push(t)}await Promise.all(l)}const $=(...a)=>a.find(n=>n!==void 0),z="noopener noreferrer";/*! @__NO_SIDE_EFFECTS__ */function F(a){const n=a.componentName||"NuxtLink",o=(e,l)=>{if(!e||a.trailingSlash!=="append"&&a.trailingSlash!=="remove")return e;const i=a.trailingSlash==="append"?O:V;if(typeof e=="string")return i(e,!0);const s="path"in e?e.path:l(e).path;return{...e,name:void 0,path:i(s,!0)}};return q({name:n,props:{to:{type:[String,Object],default:void 0,required:!1},href:{type:[String,Object],default:void 0,required:!1},target:{type:String,default:void 0,required:!1},rel:{type:String,default:void 0,required:!1},noRel:{type:Boolean,default:void 0,required:!1},prefetch:{type:Boolean,default:void 0,required:!1},noPrefetch:{type:Boolean,default:void 0,required:!1},activeClass:{type:String,default:void 0,required:!1},exactActiveClass:{type:String,default:void 0,required:!1},prefetchedClass:{type:String,default:void 0,required:!1},replace:{type:Boolean,default:void 0,required:!1},ariaCurrentValue:{type:String,default:void 0,required:!1},external:{type:Boolean,default:void 0,required:!1},custom:{type:Boolean,default:void 0,required:!1}},setup(e,{slots:l}){const i=_(),s=j(),t=b(()=>{const r=e.to||e.href||"";return o(r,i.resolve)}),d=b(()=>typeof t.value=="string"&&D(t.value,{acceptRelative:!0})),v=b(()=>e.external||e.target&&e.target!=="_self"?!0:typeof t.value=="object"?!1:t.value===""||d.value),y=x(!1),h=x(null),S=r=>{var f;h.value=e.custom?(f=r==null?void 0:r.$el)==null?void 0:f.nextElementSibling:r==null?void 0:r.$el};if(e.prefetch!==!1&&e.noPrefetch!==!0&&e.target!=="_blank"&&!Q()){const f=P();let m,u=null;A(()=>{const p=H();k(()=>{m=L(()=>{var g;(g=h==null?void 0:h.value)!=null&&g.tagName&&(u=p.observe(h.value,async()=>{u==null||u(),u=null;const c=typeof t.value=="string"?t.value:i.resolve(t.value).fullPath;await Promise.all([f.hooks.callHook("link:prefetch",c).catch(()=>{}),!v.value&&R(t.value,i).catch(()=>{})]),y.value=!0}))})})}),T(()=>{m&&N(m),u==null||u(),u=null})}return()=>{var p,g;if(!v.value){const c={ref:S,to:t.value,activeClass:e.activeClass||a.activeClass,exactActiveClass:e.exactActiveClass||a.exactActiveClass,replace:e.replace,ariaCurrentValue:e.ariaCurrentValue,custom:e.custom};return e.custom||(y.value&&(c.class=e.prefetchedClass||a.prefetchedClass),c.rel=e.rel),C(B("RouterLink"),c,l.default)}const r=typeof t.value=="object"?((p=i.resolve(t.value))==null?void 0:p.href)??null:t.value&&!e.external&&!d.value?o(E(s.app.baseURL,t.value),i.resolve):t.value||null,f=e.target||null,m=e.noRel?null:$(e.rel,a.externalRelAttribute,r?z:"")||null,u=()=>M(r,{replace:e.replace});return e.custom?l.default?l.default({href:r,navigate:u,get route(){if(!r)return;const c=U(r);return{path:c.pathname,fullPath:c.pathname,get query(){return w(c.search)},hash:c.hash,params:{},name:void 0,matched:[],redirectedFrom:void 0,meta:{},href:r}},rel:m,target:f,isExternal:v.value,isActive:!1,isExactActive:!1}):null:C("a",{ref:h,href:r,rel:m,target:f},(g=l.default)==null?void 0:g.call(l))}}})}const J=F(I);function H(){const a=P();if(a._observer)return a._observer;let n=null;const o=new Map,e=(i,s)=>(n||(n=new IntersectionObserver(t=>{for(const d of t){const v=o.get(d.target);(d.isIntersecting||d.intersectionRatio>0)&&v&&v()}})),o.set(i,s),n.observe(i),()=>{o.delete(i),n.unobserve(i),o.size===0&&(n.disconnect(),n=null)});return a._observer={observe:e}}function Q(){const a=navigator.connection;return!!(a&&(a.saveData||/2g/.test(a.effectiveType)))}export{J as _};
