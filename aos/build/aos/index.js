(()=>{"use strict";const o=window.wp.blocks,e=window.wp.i18n,s=window.wp.blockEditor,n=window.ReactJSXRuntime,t=JSON.parse('{"UU":"fwd-blocks/aos"}');(0,o.registerBlockType)(t.UU,{edit:function(){return(0,n.jsx)("p",{...(0,s.useBlockProps)(),children:(0,e.__)("aos – hello from the editor!","aos")})},save:function(){return(0,n.jsx)("p",{...s.useBlockProps.save(),children:"aos – hello from the saved content!"})}})})();