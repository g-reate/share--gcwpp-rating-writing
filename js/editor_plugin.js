( function() {
    tinymce.create( 'tinymce.plugins.newButtons', {
      getInfo : function() {
        return {
          longname : 'Rating-Writing Buttons',
          author : 'grace-create',
          authorurl : 'http://grace-create.com/',
          infourl : 'http://grace-create.com/',
          version : "1.0"
        };
      },
      init : function( ed, url ) {
        var t = this;
        t.editor = ed;
        ed.addCommand(
          'rating-writing',
          function() {
            var str = t._newButton();
            ed.execCommand( 'mceInsertContent', false, str );
          }
        );
        ed.addButton( 'rating-writing', {
          title : 'Rating-Writing',
          cmd : 'rating-writing',
          image : url + '/images/rw_btn.png'
        });
      },
      _newButton : function( d, fmt ) {
        str = '[rating-writing]';
        return str;
      }
    });
    tinymce.PluginManager.add( 'newButtons', tinymce.plugins.newButtons );
  }
)();