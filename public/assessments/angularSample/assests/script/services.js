// services page 
// main service 
myapp.service("mainservice",function(){
    // we declare this as mser 
    var mser = this;
    mser.usernmae;
    mser.userbalance;
    mser.user_upi;
    mser.userdata=[{userid:0,uname:"obito",user_upi:"1234567",useracc:"123456789",ubalance:50000},{userid:1,uname:"yaswant",user_upi:"15121512",useracc:"1222456789",ubalance:50000}]
})
// second service 
myapp.service("secondservice",function(){
    // here we declare this as 
    var sser=this;
    sser.o_user=[]
    sser.frndarr=[]
})