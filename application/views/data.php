var data = {
	
	home: {
		en: <?php echo json_encode($home); ?>,
		cz: <?php echo json_encode($home); ?>
	}, 	
			
	navigation:{
		hotel: {
			title: 'hotel',
			subpages:{
				about: {
					title: 'about',
					page: 'hotel',
					text: {
						en: 'About the Emblem',
						cz: 'About the Emblem'
					}		
				},
				rooms: {
					title: 'rooms',
					page: 'hotel',
					text: {
						en: 'Rooms and suites',
						cz: 'Rooms and suites'
					}
				},
				events: {
					title: 'events',
					page: 'hotel',
					text: {
						en: 'Events',
						cz: 'Events'
					}
				},
				location: {
					title: 'location',
					page: 'hotel',
					text: {
						en: 'Location',
						cz: 'Location'
					}
				},
				gallery: {
					title: 'gallery',
					page: 'hotel',
					text: {
						en: 'Photo Gallery',
						cz: 'Photo Gallery'
					}
				}		
			},
			text: {
				en: 'hotel',
				cz: 'hotel'
			}
		},
		club: {
			title: 'club',
			text: {
				en: 'club',
				cz: 'club'
			}
		},
		restaurant: {
			title: 'restaurant',
			text: {
				en: 'restaurant',
				cz: 'restaurant'
			}
		},
		spa: {
			title: 'spa',
			text: {
				en: 'spa',
				cz: 'spa'
			}
		},
		magazette: {
			title: 'magazette',
			text: {
				en: 'magazette',
				cz: 'magazette'
			}
		}
	},
	
	subnav: {
		hotel: {
			name: 'hotel',
			pages: {
				about: {
					title: 'about',
					page: 'hotel',
					text: {
						en: 'About the Emblem',
						cz: 'About the Emblem'
					}		
				},
				rooms: {
					title: 'rooms',
					page: 'hotel',
					text: {
						en: 'Rooms and suites',
						cz: 'Rooms and suites'
					}
				},
				events: {
					title: 'events',
					page: 'hotel',
					text: {
						en: 'Events',
						cz: 'Events'
					}
				},
				location: {
					title: 'location',
					page: 'hotel',
					text: {
						en: 'Location',
						cz: 'Location'
					}
				},
				gallery: {
					title: 'gallery',
					page: 'hotel',
					text: {
						en: 'Photo Gallery',
						cz: 'Photo Gallery'
					}
				}
			}
		
		}
		
	}
	
}

var absurl = '<?php echo base_url() ?>';