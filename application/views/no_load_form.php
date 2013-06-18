<!-- Start Realtime when the body has loaded. -->
<body>

<div class="topbar">
        <div class="top-container">
          <h1>CoteWad</h1>
          <form action="signout" method="post">
          <button class="button" type="submit">Logout</button>
          </form>
          <button class="button" type="submit" onclick="window.location.href='https://github.com/IordacheClaudiu/CoteWad'">GitHub for this App</button>  
      </div>
</div>
<div id="left_container">
<div class="docviewer">
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  <p>Aici vin toate documentele la care are acces puse cu un script php</p>
  
</div>
    <button id="createButton" type="submit">Create Document</button>
</div>

  <button id="authorizeButton" disabled>You must authorize</button>

<div id="right_container">
  <!-- Text area that will be used as our collaborative controls. -->
  <textarea id="editor" rows="15" cols="50" disabled="true"></textarea>
</div>
  
  <div class="bottom-container">
  <!-- Undo and redo buttons. -->
  	<button id="undoButton" disabled>Undo</button>
  	<button id="redoButton" disabled>Redo</button>
  	<button id="saveButton" >Save</button>
  </div>
  
  
  <script>
    /**
     * This function is called the first time that the Realtime model is created
     * for a file. This function should be used to initialize any values of the
     * model. In this case, we just create the single string model that will be
     * used to control our text box. The string has a starting value of 'Hello
     * Realtime World!', and is named 'text'.
     * @param model {gapi.drive.realtime.Model} the Realtime root model object.
     */
    function initializeModel(model) {
      var string = model.createString('Hello Realtime World!');
      model.getRoot().set('text', string);
    }

    /**
     * This function is called when the Realtime file has been loaded. It should
     * be used to initialize any user interface components and event handlers
     * depending on the Realtime model. In this case, create a text control binder
     * and bind it to our string model that we created in initializeModel.
     * @param doc {gapi.drive.realtime.Document} the Realtime document.
     */
    function onFileLoaded(doc) {
      var string = doc.getModel().getRoot().get('text');

      // Keeping one box updated with a String binder.
      var textArea1 = document.getElementById('editor');
      gapi.drive.realtime.databinding.bindString(string, textArea1);

      // Enabling UI Element.
      textArea1.disabled = false;
     

      // Add logic for undo button.
      var model = doc.getModel();
      var undoButton = document.getElementById('undoButton');
      var redoButton = document.getElementById('redoButton');

      undoButton.onclick = function(e) {
        model.undo();
      };
      redoButton.onclick = function(e) {
        model.redo();
      };

      // Add event handler for UndoRedoStateChanged events.
      var onUndoRedoStateChanged = function(e) {
        undoButton.disabled = !e.canUndo;
        redoButton.disabled = !e.canRedo;
      };
      model.addEventListener(gapi.drive.realtime.EventType.UNDO_REDO_STATE_CHANGED, onUndoRedoStateChanged);
    }

    /**
     * Options for the Realtime loader.
     */
    var realtimeOptions = {
      /**
       * Client ID from the APIs Console.
       */
      clientId: '1064857284588-4fp15p783tl7vb417e4dskq1jrk332ff.apps.googleusercontent.com',

      /**
       * The ID of the button to click to authorize. Must be a DOM element ID.
       */
      authButtonElementId: 'authorizeButton',

      /**
       * Function to be called when a Realtime model is first created.
       */
      initializeModel: initializeModel,

      /**
       * Autocreate files right after auth automatically.
       */
      autoCreate: true,

      /**
       * Autocreate files right after auth automatically.
       */
      defaultTitle: "New Realtime Quickstart File",

      /**
       * Function to be called every time a Realtime file is loaded.
       */
      onFileLoaded: onFileLoaded
    }

    /**
     * Start the Realtime loader with the options.
     */
    function startRealtime() {
      var realtimeLoader = new rtclient.RealtimeLoader(realtimeOptions);
      realtimeLoader.start();
    }

  </script>