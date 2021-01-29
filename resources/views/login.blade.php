<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> KALAI INFO LOGIC PRIVATE LIMITED -- NURTURING BETTER TECHNOLOGIES -</title>

    <meta name="Description" content="NURTURING BETTER TECHNOLOGIES, Fueling Your Innovative Imaginations">
    <meta name="Keywords" content="NURTURING, BETTER, TECHNOLOGIES, Kalai, info, logic, private, limited ,Fueling Your Innovative Imaginations, industrial,automation, software development, customised software development">

   <link rel="icon" href="https://www.kalai.info//assets/images/logo.png" type="image/png">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
        input{
          
          margin: 5px;
        }
        body{
          background: mintcream;
        }
    </style>  
  </head>
  
  <body class="container-fluid">
    <div class="container">

      <div class="row">
          <div class="col-8 d-none d-sm-none d-md-none d-lg-block">
              <img src="{{asset('public/images_kalai/LMS.png')}}" class="w-100 p-5">
          </div>
          <div class="col-lg-4 col-sm-12 pt-5">
            <img src="{{asset('images_kalai/logo_1.png')}}" alt="" class="d-none d-block d-xs-block d-sm-block d-md-none"><br/>
       
              <h2 class="pt-5">Customer Login</h2>
                  <hr/>
              <form method="post" action="/company/dashboard">
                @csrf
                       <label for="">Email</label>
                        <input type="email" name="email" class="form-control"/>
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control"/>
                       
      
                        <input type="checkbox"/>I Agree all <a href="#" data-bs-toggle="modal" data-bs-target="#termsconditions">terms and conditions</a>
      
                        <input type="submit" value="Login" class="form-control btn btn-outline-success"/> <br/>
      
                        <br/>
      
                    
                        <a href="#" class="btn btn-default float-right"> Forgot Password <i class="fas fa-arrow-right"></i></a><br/>
                        
                  <hr/>
             
  
              </form>
          </div>
          <div class="col-12">
              <div class="fixed-bottom"  align="center">

               
                  <a href="#" data-bs-toggle="modal" data-bs-target="#termsconditions">Terms and conditions</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                  <a href="#" data-bs-toggle="modal" data-bs-target="#privacypolicy">Privacy policy</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                  <a href="#">Partner with us</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                  <a href="#" data-bs-toggle="modal" data-bs-target="#contactus">Contact us</a>
                  <hr/>
                  <h6>Copyright 2018-{{date('Y')}} All rights reserved by Kalai Info Logic Private Limited</h6>
                  <span>KALAI PRO Best viewd in 1024 X 728 resolution and supported browsers 
                      <img src="https://lms.kalaipro.com/storage/app/public/imgs/browsers.png" height="20px"/>
                  </span>
              </div>
        
          </div>
    
          <div class="modal fade" id="termsconditions">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
              
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h5 class="modal-title">KALAI PRO -- Terms & conditions</h5>
                      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                      <div class="modal-body">
                          <h5>With Effective from 1st September’2020</h5>
                          <p>This website (this “Site”) is brought to you (“User”) by Kalai Info Logic Pvt Ltd. (Kalai Educational Plus)</p>
                          <p>
                              Your use of this Site is subject to all terms and policies posted on this Site (including the Privacy Policy, collectively referred to as “Terms of Use”). The Terms of Use may be revised from time to time through an updated posting, and therefore you should check the Terms of Use periodically. Revisions are effective upon posting and your continued use of this Site following the posting of revisions to the Terms of Use will indicate your acceptance of such revisions.
                          </p>
                          <p>
                              It is important to us that this Site provides a helpful and reliable experience to Users. To protect our rights and yours, we have prepared these Terms of Use that apply to all visitors to this Site. If you have any questions concerning the Terms of Use, please Contact Us.
                          </p>
                          <p>
                              PLEASE ALSO NOTE THAT THE USAGE AND PURCHASE TERMS AND PRIVACY POLICIES OF VARIOUS KALAI INFO LOGICS PVT LTD. PRODUCTS AND SERVICES WITHIN THIS SITE OR LINKED TO THIS SITE MAY BE SUBJECT TO DIFFERENT TERMS AND POLICIES. PLEASE CHECK THESE TERMS AND POLICIES FREQUENTLY TO DETERMINE THE TERMS APPLICABLE TO SUCH KALAI INFO LOGICS PVT LTD. PRODUCTS AND SERVICES.
                          </p>
                          <p>
                              BY USING OR DOWNLOADING INFORMATION FROM THIS SITE, YOU REPRESENT THAT YOU HAVE READ AND UNDERSTOOD THESE TERMS OF USE AND THE PRIVACY POLICY AND AGREE TO BE BOUND BY THEM. IF YOU DO NOT AGREE WITH ANY PART OF THESE TERMS OF USE OR THE PRIVACY POLICY GOVERNING THIS SITE, YOU SHOULD NOT USE THIS SITE. BY USING OR DOWNLOADING INFORMATION FROM THIS SITE, YOU AGREE TO USE OUR SERVICES IN A MANNER CONSISTENT WITH ALL APPLICABLE LAWS AND REGULATIONS AND IN ACCORDANCE WITH THESE TERMS OF USE.
                          </p>
                          <h4>Privacy</h4>
                          <p>Kalai Info Logics Pvt Ltd. is concerned about the safety and privacy of all users, particularly children, of this Site. Please read our Privacy Policy, which is an important part of these Terms of Use.</p>
                          <p>IF YOU ARE UNDER 18 YEARS OF AGE, PLEASE BE SURE TO READ THESE TERMS OF USE AND PRIVACY POLICY WITH YOUR PARENTS OR GUARDIAN AND ASK QUESTIONS ABOUT THINGS YOU DO NOT UNDERSTAND.</p>
                          <h5>User License</h5>
                          <p>
                              Users are granted, subject to these Terms of Use, a personal, non-exclusive, non-assignable, and non-transferable license to access and use this Site for personal and non-commercial use only. Modifications of any materials on this Site or use of the materials for any purpose other than as contemplated in this Site is a violation of Kalai Info Logics Pvt Ltd.’ copyright and proprietary rights. You agree not to reverse engineer, duplicate, publish, modify, or otherwise distribute the materials on this Site unless specifically authorized in writing by Kalai Info Logics Pvt Ltd. to do so.
                              Kalai Info Logics Pvt Ltd. does not guarantee the accuracy or completeness of any information or content. You agree that you must evaluate, and bear all risks associated with, the use of any content, including any reliance on the accuracy, completeness, or usefulness of such content.
                          </p>
                          <h5>Postings</h5>
                          <p>
                              To the extent that certain areas of this Site provide Users an opportunity to post messages or other information (collectively, “Postings”), BE ADVISED THAT KALAI INFO LOGICS PVT LTD. HAS NO OBLIGATION TO SCREEN, EDIT, OR REVIEW SUCH POSTINGS PRIOR TO THEIR APPEARANCE ON THIS SITE, and Postings do not necessarily reflect the views of Kalai Info Logics Pvt Ltd.. To the fullest extent permitted by applicable laws, Kalai Info Logics Pvt Ltd. shall in no event have any responsibility or liability for the Postings (or the loss thereof for any reason) or for any claims, damages, or losses resulting from their use (or loss) and/or appearance on this Site. The Postings are accessible and viewable to the general public and other users of this Site. Kalai Info Logics Pvt Ltd. reserves the right to monitor all Postings and to remove anything which it considers in its absolute discretion to be offensive or otherwise in breach of these Terms of Use or for any other reason as it deems necessary. You hereby represent and warrant that you have all necessary rights in and to all Postings and all material they contain; that your Postings shall not infringe any proprietary or other rights of third parties; that your Postings shall not contain any viruses or other contaminating or destructive devices or features; that your Postings will not contain any defamatory, indecent, offensive, tortious, or otherwise unlawful material or content; and that your Postings will not be used to carry out or solicit any unlawful activity and/or be used to make commercial solicitations.
                          </p>
                          <p>
                              You hereby authorize Kalai Info Logics Pvt Ltd. to use and/or authorize others to use all or part of your Postings in any manner, format, or medium that Kalai Info Logics Pvt Ltd. or such other parties see fit. You shall have no claim or other recourse against Kalai Info Logics Pvt Ltd. for infringement of any proprietary right in Postings.
                          </p>
                          <h5>Unlawful Use</h5>
                          <p>
                              As a condition of your use of this Site, you warrant to Kalai Info Logics Pvt Ltd. that you will not use this Site for any purpose that is unlawful or prohibited by the Terms of Use. You agree not to use this Site in any manner that could damage, disable, overburden, or impair this Site or interfere with any other party’s use and enjoyment of this Site. You agree not to obtain or attempt to obtain through this Site any materials or information not intentionally made available to you through this Site.
                          </p>
                          <h5>Termination</h5>
                          <p>
                              Kalai Info Logics Pvt Ltd. reserves the right at any time, and from time to time, to modify or discontinue, temporarily or permanently, this Site, or any part thereof, with or without notice. You agree that Kalai Info Logics Pvt Ltd. will not be liable to you or any third party for any modification, suspension, or discontinuation of this Site, or any part thereof.
                          </p>
                          <h5>Service Terms</h5>
                          <p>
                              The Service is billed in advance on a yearly basis and is non-refundable. There will be no refunds or credits for partial months of service, upgrade/downgrade refunds, or refunds for months unused with an open account.
                          </p>
                          <p>
                              All fees are exclusive of all taxes, levies, or duties imposed by taxing authorities if not stated otherwise. The Client will be responsible for payment of all such taxes, levies, or duties.
                          </p>
                          <p>
                              For any upgrade or downgrade in plan level, your credit card that you provided will automatically be charged the new rate on your next billing cycle.
                              <br/>
                              Downgrading your Service may cause the loss of Content, features, or capacity of your Account. The service provider does not accept any liability for such loss.
                          </p>
                          <h5>Links to Other Sites or Apps</h5>
                          <p>
                              This Site may provide links to third party websites, APIs or resources. We also use YouTube API for live streaming of classes. Because we do not control such websites and APIs, you acknowledge and agree that Kalai Info Logics Pvt Ltd. is not responsible or liable for the content, products or performance of such third party websites and resources, and you hereby irrevocably waive any claim against Kalai Info Logics Pvt Ltd. with respect to such websites and resources. Kalai Info Logics Pvt Ltd. reserves the right to terminate any link at any time without notice. The inclusion of a link to such another website or resource does not constitute or imply an endorsement, authorization, sponsorship, or affiliation by Kalai Info Logics Pvt Ltd. of that website or resource, or any products or services provided therein. The information practices of those websites are not covered by this Privacy Policy or any other policies or terms applicable to this Site. We recommend that you review any terms of use and privacy policy of any linked third party website before providing any information to that website or using its products and services.
                          </p>
                          <p>
                              Please note that this Site may also provide links to other sites brought to you by Kalai Info Logics Pvt Ltd.. The Privacy Policy and Terms of Use of other Kalai Info Logics Pvt Ltd. sites may vary from this Site. We recommend that you review the privacy statements, terms of use and other policies or terms that may apply to other Kalai Info Logics Pvt Ltd. sites if you should choose to use such sites.
                          </p>
                          <h5>Copyright and Trademark Notices</h5>
                          <p>
                              The entire content of this Site and any supporting software are the proprietary property of Kalai Info Logics Pvt Ltd. and/or its licensors, and are protected by India and international copyright and other intellectual property laws. The reproduction, redistribution, modification or publication of any part of this Site without the express written consent of Kalai Info Logics Pvt Ltd. and/or its licensors is strictly prohibited.
                          </p>
                          <p>
                              You agree not to display, disparage, dilute, or taint our trademarks or use any confusing similar marks or use our trademarks in such a way that would misrepresent the ownership of such marks. Any permitted use of our trademarks by you shall be to the benefit of Kalai Info Logics Pvt Ltd.
                          </p>
                          <h5>Disclaimer of Warranties</h5>
                              <p>
                                  YOU EXPRESSLY UNDERSTAND AND AGREE THAT:<br/>
                                  YOUR USE OF THIS SITE IS AT YOUR OWN RISK. THIS SITE IS PROVIDED ON AN “AS IS” AND “AS AVAILABLE” BASIS. KALAI INFO LOGICS PVT LTD. EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NON-INFRINGEMENT.
                              </p>
                              <p>
                                  KALAI INFO LOGICS PVT LTD. MAKES NO WARRANTY THAT (i) THIS SITE WILL MEET YOUR REQUIREMENTS, (ii) THIS SITE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (iii) THE RESULTS THAT MAY BE OBTAINED FROM THE USE OF THIS SITE WILL BE ACCURATE OR RELIABLE, (iv) THE QUALITY OF ANY PRODUCTS, SERVICES, INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU THROUGH THIS SITE WILL MEET YOUR EXPECTATIONS, AND (v) ANY ERRORS OR DEFECTS IN THIS SITE WILL BE CORRECTED.
                              </p>
                              <p>
                                  ANY MATERIAL UPLOADED/DOWNLOADED OR OTHERWISE OBTAINED, FROM THIS SITE IS DONE AT YOUR OWN DISCRETION AND RISK; KALAI INFO LOGICS PVT LTD. SHALL NOT BE LIABLE, AND YOU WILL BE SOLELY RESPONSIBLE, FOR ANY AND ALL LOSS, OR CORRUPTION, OF DATA UPLOADED OR INPUTTED BY YOU THROUGH THE USE OF THIS SITE, AND ALL SERVICING, REPAIR, OR CORRECTION AND ANY DAMAGE TO YOUR HARDWARE AND SOFTWARE THAT MAY RESULT FROM THE USE OF THIS SITE.
                              </p>
                          <h5>Limitation of Liability</h5>
                          <p>
                              IN NO EVENT SHALL KALAI INFO LOGICS PVT LTD. BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE OR EXEMPLARY DAMAGES, DAMAGES FOR LOSS OF PROFITS, GOODWILL, USE OR DATA, OR OTHER INTANGIBLE LOSSES (EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), RESULTING FROM: (i) THE LOSS OF DATA AND/OR THE USE OR THE INABILITY TO USE THIS SITE; (ii) THE COST OF PROCUREMENT OF SUBSTITUTE GOODS AND SERVICES RESULTING FROM ANY GOODS, DATA, INFORMATION OR SERVICES PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO THROUGH OR FROM THIS SITE; (iii) UNAUTHORIZED ACCESS TO OR ALTERATION OF YOUR TRANSMISSIONS OR DATA; (iv) STATEMENTS OR CONDUCT OF ANY THIRD PARTY ON THIS SITE; OR (v) ANY OTHER MATTER RELATING TO THIS SITE.
                          </p>
                          <p>
                              SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, SOME OF THE ABOVE LIMITATIONS OF THE ABOVE MAY NOT APPLY TO YOU.
                          </p>
                          <h5>Indemnification</h5>
                          <p>
                              You agree to indemnify and hold Kalai Info Logics Pvt Ltd. and its subsidiaries, affiliates, officers, agents, directors, licensors, contractors and employees harmless from any claim or demand, including reasonable attorneys’ fees, made by any third party due to or arising out of your use of this Site, your connection to this Site, your violation of these Terms of Use, or your violation of any rights of another User.
                          </p>
                          <h5>Submissions</h5>
                          <p>
                              Kalai Info Logics Pvt Ltd. always welcomes suggestions and comments regarding this Site from Users. Any comments or suggestions submitted to this Site or Kalai Info Logics Pvt Ltd., either online or offline, will become Kalai Info Logics Pvt Ltd.’s property upon their submission. This policy is intended to avoid the possibility of future misunderstandings when projects developed by Kalai Info Logics Pvt Ltd. might seem to others to be similar to their own submissions or comments.
                          </p>
                          <h5>General Information; Governing Law</h5>
                          <p>
                              The Terms of Use constitute the entire agreement between you and Kalai Info Logics Pvt Ltd., govern your use of this Site, and replace any prior agreements between you and Kalai Info Logics Pvt Ltd. concerning this Site. You also may be subject to additional terms and conditions that may apply when you use affiliated services, third-party content or third-party software. These Terms of Use and the relationship between you and Kalai Info Logics Pvt Ltd. will be governed by the laws of India without regard to its conflict of law provisions. You and Kalai Info Logics Pvt Ltd. agree to submit to the personal and exclusive jurisdiction of the courts located within India. The failure of Kalai Info Logics Pvt Ltd. to exercise or enforce any right or provision of these Terms of Use shall not constitute a waiver of such right or provision. If any provision of these Terms of Use is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties’ intentions as reflected in the provision, and the other provisions of these Terms of Use remain in full force and effect. You agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to use of this Site or these Terms of Use must be filed within one (1) year after such claim or cause of action arose or be forever barred.
                          </p>
  
  
                      </div>
                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
                  
              </div>
              </div>
          </div>
  
          <div class="modal fade" id="privacypolicy">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                  <!-- Modal Header -->
                  <div class="modal-header">
                  <h5 class="modal-title">KALAI PRO -- PRIVACY POLICY </h5>
                  <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                  <div class="modal-body">
                      <h6><b>With Effective from 1st September 2020</b></h6>
                     
                      
                      <p>
                          Kalai Pro is working as an agent of an entity as well as a learning management platform between Vendor/Content provider/ Course creator and its End user/Buyer who access or use its services. It includes all the websites, apps, product and contents.
                      </p>
                      <p>
                          We reserve the right, at our sole Discretion, to change, modify, add or remove portions of this Privacy policy, at any time without any prior written notice to you. It is your responsibility to review these terms periodically for updates/ changes.
                      </p>
                      <p>
                          We value your trust you place in us. That is the reason why we insist upon the highest standards for secure and safe transactions and user information privacy. Please read the policy carefully to learn about our system of information gathering and dissemination processes.
                      </p>
                      <h5>Who We Are</h5>
                      <p>Any references made in this Privacy Policy to "us", "we", "our services", "Kalai Pro sites" and/or "Kalai Educational Pro" shall deemed to have been made to Kalai Pro.</p>
                      <p>
                          Our privacy policy is subject to change at any time without notice. To make sure you are aware of any changes, please review this policy periodically. By visiting Kalai Educational Pro, you agree to be bound by the terms and conditions of this Privacy Policy. If you do not agree please do not use or access our services. By mere use of our services, you expressly consent to use and disclosure of your personal information in accordance with this Privacy Policy. This Privacy Policy is incorporated into and subject to the Terms and Conditions.
                      </p>
                      <p>
                          We believe that information-gathering and use should go hand-in-hand with transparency. This Privacy Policy explains how Kalai Educational Pro that hosts to collect, use, and shares information we receive from you through your use of our services. It is essential to understand that, by using any of our services, you consent to the collection, transfer, processing, storage, disclosure, and use of your information as described in this Privacy Policy.
                      </p>
                      <p>
                          This Privacy Policy also applies to the information that we obtain through your use of "Site" via a "Device" or when you otherwise interact with Kalai Pro. A "Device" is any computer used to access the “Site”, including without limitation of a desktop, laptop, mobile phone, tablet, or other consumer electronic device. “Site” includes the Kalai Pro web site and SaaS service but does not include any other own or third party products or services for which a separate privacy policy is provided. These are third party products or services that you may choose to integrate with Kalai Pro services. You should always review the policies of third party products and services to make sure you are comfortable with the ways in which they collect and use your information.
                      </p>
                      <p>
                          We do not sell or rent your nonpublic information, nor do we give it to others to sell you anything. We use it to figure out how to make our services more engaging and accessible, to see which ideas work, and to make learning and contributing more fun. We use this information to make our services better for you. We believe that you shouldn't have to provide personal information to participate in the free knowledge movement. User has to provide certain information for notification and security purposes, including a mobile number, email address, first name, last name, gender, address, birth date, account username and password to sign up for a standard account or contribute content to the Kalai Educational Pro.
                      </p>
  
                      <h5>Content</h5>
                      <ul>
                          <li>Introduction</li>
                          <li>Collection of personally identifiable Information and other Information</li>
                          <li>Use of cookies</li>
                          <li>Use of Demographic/ Profile data/ Your Information</li>
                          <li>Sharing of Personal Information</li>
                          <li>Confidentiality and Security of personal Information</li>
                          <li>Change in Privacy Policy</li>
                          <li>Advertisement on Kalai Pro</li>
                          <li>Your consent</li>
                          <li>Governing Laws and Jurisdiction</li>
                          <li>Contact Us</li>
                      </ul>
                      <h5>Introduction</h5>
                      <p>
                          This privacy Policy describes our system of working in connection with information collected through our services.<br/>
                          This Privacy Policy applies to all users, including both those who use Kalai Pro without being registered with or subscribing to our service and also those who have registered with or subscribed to our service. <br/>
                          This Privacy Policy applies to Kalai Pro's collection and use of your personal information like information that identifies a specific person such as full name or email address. It also describes generally Kalai Pro's practices for handling non-personal information.
                      </p>
                      <h5>Collection of Personally Identifiable Information</h5>
                      <p>
                          When you use our services, we collect and save your personal information which is provided by you. Our primary goal in doing so is to provide you a safe, efficient, smooth and secure customized experience. This allows us to provide services and features that most likely meet your requirement, and to customize our services to make your experience safer and easier. In general, you can browse our services without telling us who you are or revealing any personal information or identity about yourself. Once you give us your personal information, you are not anonymous to us.<br/>
                          We may automatically track certain information about you, based upon your behavior or interest on Kalai Pro. Where possible, we indicate which fields are required and which fields are optional as per your interest. You always have the option to not provide information by choosing not to use a particular service or feature on the Kalai Pro.
                      </p>
                      <h5>Use of Cookies</h5>
                      <p>
                          A "cookie" is a small piece of information stored by a web server on a web browser so it can be later read back from that browser. Cookies are useful for enabling the browser to remember information specific to a given user. We place both permanent and temporary cookies in your computer's hard drive. The cookies do not contain any of your personally identifiable information.<br/>
                          We use data collection devices such as "cookies" on certain pages of the Website to help analyze our web page flow, measure promotional effectiveness, and promote trust and safety. "Cookies" are small files placed on your hard drive that assist us in providing our services. We offer certain features that are only available through the use of a "cookie".<br/>
                          We also use cookies to allow you to enter your password less frequently during session. Cookies can also help us provide information that is targeted to your interests. Most cookies are "session cookies," meaning that they are automatically deleted from your hard drive at the end of session. <br/>
                          You are always free to decline our cookies if your browser permits, although in that case you may not be able to use certain features on the Website and you may be required to re-enter your password more frequently during a session. Additionally, you may encounter "cookies" or other similar devices on certain pages of the Website that are placed by third parties. If you transact with us, we collect some additional information, such as a user's postal address, contact number and payment information.
  
                      </p>
                      <h5>Use of Demographic / Profile Data / Your Information</h5>
                      <p>
                          We use your personal information to provide the services you request. We use your personal information to resolve disputes; troubleshoot problems, customize your experience; detect and protect us against error, fraud and other criminal and illegal activity and enforce our terms and conditions. In our efforts to continually improve our service offerings, we collect and analyze demographic and profile data about our users' activity on Kalai Pro. We identify and use your IP address to solve diagnose problems with our server, and to administer our services.
                      </p>
                      <h5>Sharing of personal information with others</h5>
                      <p>
                          We do not share your personal information with any other business entities, subsidiary and affiliates. We may however use in a general sense, create marketing statistics, identify user demands etc., to identify and meet customer needs generally. In addition, we may use the information that you provide to improve our website and services but not for any other use.<br/>
                          We may disclose personal information if required to do so by law or in the good faith that such disclosure is reasonably necessary to respond to summons, court orders, or other legal process. We may disclose personal information to law enforcement offices, third party rights owners in the good faith, that such disclosure is reasonably necessary to enforce our Privacy Policy.                        
                      </p>
                      <h5>Confidentiality and Security of personal Information</h5>
                      <p>
                          We will take all the possible and reasonable steps to protect Personal Information from loss, misuse and unauthorized access, disclosure, alteration and destruction. We have implemented appropriate physical, electronic and managerial procedures to help safeguard and secure personal information from loss, misuse, unauthorized access or disclosure, alteration or destruction.<br/>
                          We consider the confidentiality and security of your information to be of the utmost importance. We will use standard physical, technical and administrative security measures like Blockchain to keep your personal identifiable information confidential and secure as well as will not share it with the third parties, except as otherwise provided in this Privacy Policy, or unless we have good faith belief that such disclosure is necessary in special cases, such as physical threat to you or others. As the environment of the Internet is not hundred percent secure, we cannot guarantee the security of personal information, and there is some risk that an unauthorized third party may find a way to circumvent our security systems or that transmission of your information over the Internet will be intercepted. It is your responsibility to protect the security of your account, log-in and password information. Please note that emails and other communications you send to us through our services are not encrypted.                        
                      </p>
                      <h5>Changes in Privacy Policy</h5>
                      <p> 
                          Kalai Pro may, from time to time, make changes to this Privacy Policy, the social terms or the cookies. Such revisions shall take effect immediately, please refer our privacy policy from time to time.
                      </p>
                      <h5>Advertisements of "Third Party" on Kalai Pro</h5>
                       <p>
                          We do not provide your data to any Third Party providers nor do we advertise products or services of any Third Party.
                      </p>	
                      <h5>Your Consent about personal information</h5>
                      <p>
                          By using our services or by providing your information, you give your consent to the collection and use of the information you disclose on Kalai Pro in accordance with this Privacy Policy, including but not limited to your consent for sharing your information as per this privacy policy. If we decide to change our privacy policy, we will post those changes on this page so that you are always aware of what information we collect, how we use it, and where we disclose it.
                      </p>
                      <h5>Governing Law and Jurisdiction</h5>	
                      <p>
                          Any action at law, suit in equity or judicial proceeding arising directly, indirectly, or otherwise in connection with, out of, related to or from this Agreement shall be litigated only in the court having jurisdiction in Ahmedabad, in the state of Gujarat, India.
                      </p>
  
                      <h5>Feed back</h5>
                      <p>
                          Contact us
                          If you have any questions or queries about this Privacy policy, please contact us at:
                          <a href="mailto:support@kalai.info">support@kalai.info</a>
                      </p>
                  </div>
  
                  <!-- Modal footer -->
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  </div>
  
              </div>
              </div>
          </div>
  
          <div class="modal fade" id="contactus">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
              
                  <!-- Modal Header -->
                  <div class="modal-header">
                      <h5 class="modal-title">CONTACT US</h5>
                      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                  </div>
                  <!-- Modal body -->
                      <div class="modal-body">
                          <h5>Need help contact 24 x 7 </h5>
                          <a href="mailto:support@kalai.info">support@kalai.info</a><br/>
                          <a href="tel:+91-9626522202">+91-9626522202</a>
                      </div>
                  </div>
              </div>
          </div>
  
  
      
  
      </div>
      
  
  </div>

    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script> --}}

  </body>
</html>