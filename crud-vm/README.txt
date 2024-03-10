network DMZ_APP :
  vm dns-dhcp = 192.168.10.2/24
  vm web01 = 192.168.10.10/24
  vm r1 = LAN : 192.168.10.2/24
  vm r1 = WAN : DHCP
  vm r2 = 192.168.10.254/24

network DMZ_DATA :
  vm r2 = 192.168.20.1/24
  vm db = 192.168.20.10/24
