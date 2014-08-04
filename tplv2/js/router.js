Tuitui.Router = Backbone.Router.extend({

  routes: {
    "settingProfile": "settingProfile",
    "settingAvatar": "settingAvatar",
    "settingInvite": "settingInvite",
    "settingSafe": "settingSafe"
  },

  settingProfile: function() {
    SelectPerson();
  },
  settingAvatar: function() {
    SelectHead();
  },
  settingInvite: function() {
    SelectInvite();
  },
  settingSafe: function() {
    SelectSafe();
  }

});