<nav class="navbar navbar-header navbar-expand-lg">
	<div class="container-fluid">
		<div class="collapse" id="search-nav">
			<form class="navbar-left navbar-form nav-search mr-md-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<button type="submit" class="btn btn-search pr-1">
							<i class="fa fa-search search-icon"></i>
						</button>
					</div>
					<input type="text" placeholder="Search ..." class="form-control">
				</div>
			</form>
		</div>
		<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
			<li class="nav-item toggle-nav-search hidden-caret">
				<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
					<i class="fa fa-search"></i>
				</a>
			</li>
			<li class="nav-item dropdown hidden-caret">
				<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-bell"></i>
					<span class="notification">4</span>
				</a>
				<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
					<li>
						<div class="dropdown-title">You have 4 new notification</div>
					</li>
					<li>
						<div class="notif-scroll scrollbar-outer">
							<div class="notif-center">
								<a href="#">
									<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
									<div class="notif-content">
										<span class="block">
											New user registered
										</span>
										<span class="time">5 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
									<div class="notif-content">
										<span class="block">
											Johnson purchased template
										</span>
										<span class="time">12 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-img">
										{{-- <img src="../assets/img/profile-5.jpg" alt="Img Profile"> --}}
									</div>
									<div class="notif-content">
										<span class="block">
											Reza send messages to you
										</span>
										<span class="time">12 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
									<div class="notif-content">
										<span class="block">
											Farrah liked Admin
										</span>
										<span class="time">17 minutes ago</span>
									</div>
								</a>
							</div>
						</div>
					</li>
					<li>
						<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown hidden-caret">
				<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-envelope"></i>
				</a>
				<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
					<li>
						<div class="dropdown-title d-flex justify-content-between align-items-center">
							Messages
							<a href="#" class="small">Mark all as read</a>
						</div>
					</li>
					<li>
						<div class="message-notif-scroll scrollbar-outer">
							<div class="notif-center">
								<a href="#">
									<div class="notif-img">
										{{-- <img src="../assets/img/profile-2.jpg" alt="Img Profile"> --}}
									</div>
									<div class="notif-content">
										<span class="subject">Ginger Johnston</span>
										<span class="block">
											Lorem ipsum dolor sit....
										</span>
										<span class="time">5 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-img">
										{{-- <img src="../assets/img/profile-3.jpg" alt="Img Profile"> --}}
									</div>
									<div class="notif-content">
										<span class="subject">Hileri Jecno</span>
										<span class="block">
											Lorem ipsum dolor sit....
										</span>
										<span class="time">12 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-img">
										{{-- <img src="../assets/img/profile-4.jpg" alt="Img Profile"> --}}
									</div>
									<div class="notif-content">
										<span class="subject">Erica Hughes</span>
										<span class="block">
											Lorem ipsum dolor sit....
										</span>
										<span class="time">12 minutes ago</span>
									</div>
								</a>
								<a href="#">
									<div class="notif-img">
										{{-- <img src="../assets/img/profile-5.jpg" alt="Img Profile"> --}}
									</div>
									<div class="notif-content">
										<span class="subject">John Smith</span>
										<span class="block">
											Lorem ipsum dolor sit....
										</span>
										<span class="time">17 minutes ago</span>
									</div>
								</a>
							</div>
						</div>
					</li>
					<li>
						<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
					</li>
				</ul>
			</li>
			<li class="nav-item dropdown hidden-caret">
				<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
					<div class="profile-sm">
						{{-- <img src="../assets/img/profile-1.jpg" alt="..." class="profile-img rounded-circle"> --}}
					</div>
				</a>
				<ul class="dropdown-menu dropdown-user animated fadeIn">
					<div class="dropdown-user-scroll scrollbar-outer">
						<li>
							<div class="user-box">
								{{-- <div class="profile-lg"><img src="../assets/img/profile-1.jpg" alt="image profile" class="profile-img rounded"></div> --}}
								<div class="user-detail">
									{{-- <h4>{{ auth()->user()->name}}</h4>
									<p class="text-muted">{{ auth()->user()->email }}</p> --}}
									<a href="profile.html" class="btn btn-xs btn-primary btn-sm btn-round">View Profile</a>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#"><i class="fas fa-user-alt"></i> My Profile</a>
							<a class="dropdown-item" href="#"><i class="fas fa-dollar-sign"></i> My Balance</a>
							<a class="dropdown-item" href="#"><i class="fas fa-envelope"></i> Inbox</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Account Setting</a>
							<div class="dropdown-divider"></div>
							{{-- <a class="dropdown-item" href="{{ Route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a> --}}
						</li>
					</div>
				</ul>
			</li>
			<li class="nav-item dropdown hidden-caret">
                <a class="nav-link dropdown-toggle profile-pic" href="#" id="notifDropdown" role="button"
                    data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-user"></i>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="profile-lg">
                                    <div class="nav-link dropdown-toggle profile-pic">
                                        <i class="fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="user-detail" style="margin-top: auto; margin-bottom: auto;">
                                    <h4>{{ Auth::guard()->user()->vendor_name }}</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>
                                Logout</a>
                        </li>
                    </div>
                </ul>
            </li>

		</ul>
	</div>
</nav>